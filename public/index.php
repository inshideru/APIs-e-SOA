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

$app->get("/", function() use ($app) {
    return $app['twig']->render('index.twig', []);
})->bind("index");

$app->get("/edit_produto", function() use ($app) {
    return $app['twig']->render('edit_produto.twig', []);
})->bind("edit_produto");

$app->get("/apagar_produto", function() use ($app) {
    return $app['twig']->render('apagar_produto.twig', []);
})->bind("apagar_produto");

$app->get("/novo_produto", function() use ($app) {
    return $app['twig']->render('novo_produto.twig', []);
})->bind("novo_produto");

$app->get("/ola/{nome}", function($nome) use ($app) {
    return $app['twig']->render('ola.twig', ['nome' => $nome]);
});

$app->get("/clientes", function () use ($app) {
    $dados = $app['clienteService']->fetchAll();
    return $app['twig']->render('clientes.twig', ['clientes' => $dados]);
})->bind("clientes");

$app->get("/cliente", function () use ($app) {
    $dados['nome'] = "Cliente";
    $dados['email'] = "email@cliente.com";

    $result = $app['clienteService']->insert($dados);

    return $app->json($result);
});

$app->get("/produtos", function () use ($app) {
    $dados = $app['produtoService']->fetchAll();

    return $app['twig']->render('produtos.twig', ['produtos' => $dados]);

})->bind("produtos");

$app->run();