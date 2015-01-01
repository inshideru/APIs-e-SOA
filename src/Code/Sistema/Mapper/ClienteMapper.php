<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 21/12/14
 * Time: 23:28
 */

namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Cliente;

class ClienteMapper
{
    public function insert(Cliente $cliente)
    {
        return [
            'nome' => 'Cliente X',
            'email' => 'email@cliente.com'
        ];
    }

    public function fetchAll()
    {
        $dados[0]['nome'] = "Cliente Xpto";
        $dados[0]['email'] = 'cliente@email.com';

        $dados[1]['nome'] = "Cliente Y";
        $dados[1]['email'] = 'clientey@email.com';

        return $dados;
    }
} 