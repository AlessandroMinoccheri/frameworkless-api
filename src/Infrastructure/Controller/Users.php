<?php

declare(strict_types=1);

namespace Treblle\Infrastructure\Controller;

use Treblle\Response;

class Users
{
    public function get(array $params): void
    {
        echo new Response(200,[[
            'id' => 1,
            'username' => 'foo',
            'role' => 'admin'
        ]]);
    }

    public function post(array $params): void
    {
        if (isset($params['username']) && isset($params['role'])) {
            echo new Response(201, [
                'username' => $params['username'],
                'role' =>$params['role']
            ]);
        } else {
            echo new Response(400, ['error' => 'Bad request']);
        }
    }
}
