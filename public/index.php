<?php

require_once __DIR__.'/../bootstrap.php';
use Code\Sistema\Service\ClienteService;
use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;
use Code\Sistema\Service\ProdutoService;
use Code\Sistema\Entity\Produto;
use Code\Sistema\Mapper\ProdutoMapper;

$pdo = new \PDO(DSN, DBUSER,DBPASS);

$app['clienteService'] = function() {

    $clienteEntity = new Cliente();
    $clienteMapper = new ClienteMapper();

    $clienteService = new ClienteService($clienteEntity, $clienteMapper);

    return $clienteService;
};
$app['produtoService'] = function() use ($pdo) {

    $produtoEntity = new Produto();
    $produtoMapper = new ProdutoMapper($pdo);

    $produtoService = new ProdutoService($produtoEntity, $produtoMapper);

    return $produtoService;
};

$app->get("/", function() {
    return "Olá mundo";
});

$app->get("/ola/{nome}", function($nome) {
    return "Ola {$nome}";
});

$app->get("/cliente", function () use ($app) {
    $dados['nome'] = "Cliente";
    $dados['email'] = "email@cliente.com";

    $result = $app['clienteService']->insert($dados);

    return $app->json($result);
});

$app->get("/produto", function () use ($app) {
    $dados['nome'] = "Caderno";
    $dados['descricao'] = "Caderno aramado com pautas";
    $dados['valor'] = 6.5;

    $result = $app['produtoService']->insert($dados);

    return $app->json($result);
});

$app->run();