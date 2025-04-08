<?php
require_once __DIR__ . '/../vendor/autoload.php';

use FastRoute\RouteCollector;

$dispatcher = FastRoute\simpleDispatcher(function(RouteCollector $r) {
    require __DIR__ . '/../routes.php';
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo json_encode(['erro' => 'Rota não encontrada']);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo json_encode(['erro' => 'Método não permitido']);
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        require $handler;
        break;
}
