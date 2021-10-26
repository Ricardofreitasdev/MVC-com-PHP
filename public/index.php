<?php

use Nyholm\Psr7Server\ServerRequestCreator;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__ . '/../vendor/autoload.php';

$path  = $_SERVER['PATH_INFO'] ? $_SERVER['PATH_INFO'] : "/login";
$rotas = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($path, $rotas)) {
    http_response_code(404);
    exit();
}

session_start();

$isLoginRoute = stripos($path, 'login');

if (!isset($_SESSION['logado']) && $isLoginRoute === false) {
    header('Location: /login');
    exit();
}

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory // StreamFactory
);

$request = $creator->fromGlobals();

$classeControladora = $rotas[$path];

/**
 * @var ContainerInterface $container
 */
$container = require __DIR__ . '/../config/dependencies.php';

/**
 * @var RequestHandlerInterface $controlador
 */
$controlador = $container->get($classeControladora);

$response = $controlador->handle($request);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
