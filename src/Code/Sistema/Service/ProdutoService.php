<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 30/12/14
 * Time: 17:34
 */

namespace Code\Sistema\Service;

use Code\Sistema\Entity\Produto;
use Code\Sistema\Mapper\ProdutoMapper;

class ProdutoService
{
    private $produto;
    private $produtoMapper;

    public function __construct(Produto $produto, ProdutoMapper $produtoMapper)
    {
        $this->produto = $produto;
        $this->produtoMapper = $produtoMapper;
    }

    public function insert(array $data)
    {
        $produtoEntity = new Produto();
        $produtoEntity->setNome($data['nome']);
        $produtoEntity->setDescricao($data['descricao']);
        $produtoEntity->setValor($data['valor']);

        $mapper = $this->produtoMapper;
        $result = $mapper->insert($produtoEntity);

        return $result;
    }
} 