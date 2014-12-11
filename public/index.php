<?php

require_once __DIR__.'/../bootstrap.php';
use Symfony\Component\HttpFoundation\Response;


$app->get("/", function(){
    return "Oi!";
});

$clientes = array();
$clientes[] =  array(
        'nome' => 'Marcos da Silva',
        'email' => 'marcos@uol.com.br',
        'cpf' => '987.654.213-02'
        );

$clientes[] =  array(
    'nome' => 'Miranda Lawson',
    'email' => 'miranda@cerberus.com',
    'cpf' => '629.623.456-03'
);
$clientes[] =  array(
    'nome' => 'Richard Sheppard',
    'email' => 'commanders@n7.com',
    'cpf' => '656.937.430-34'
);

$app->get("/clientes", function() use ($clientes) {
    return json_encode($clientes);
});

$app->run();