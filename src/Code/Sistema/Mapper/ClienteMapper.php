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
} 