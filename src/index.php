<?php

declare(strict_types=1);

namespace Treblle;

use Treblle\Infrastructure\Controller\Users;

require __DIR__ . '/../vendor/autoload.php';

$router = new Router();
$router->get('/users', Users::class . '::get');
$router->post('/users', Users::class . '::post');

$router->addNotFoundHandler(function () {
    echo new Response(404, []);
});

$router->run($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
