<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 30/12/14
 * Time: 17:22
 */

namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Produto;

class ProdutoMapper
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insert(Produto $produto)
    {
        $sql = "INSERT INTO produto
                  (nome, descricao, valor)
                VALUES
                  (:nome, :descricao, :valor)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':valor', $produto->getValor());

        $stmt->execute();

        return array(
            'nome' => $produto->getNome(),
            'descricao' => $produto->getDescricao(),
            'valor' => $produto->getValor()
        );
    }
} 