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
        $this->produto->setNome($data['nome']);
        $this->produto->setDescricao($data['descricao']);
        $this->produto->setValor($data['valor']);

        return $this->produtoMapper->insert($this->produto);
    }

    public function fetchAll()
    {
        return $this->produtoMapper->fetchAll();
    }
} 