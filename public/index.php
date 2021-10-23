<?php

require __DIR__ . '/../vendor/autoload.php';

$path = $_SERVER['PATH_INFO'] ? $_SERVER['PATH_INFO'] : "/login";
$rotas = require __DIR__ . '/../config/routes.php';


if(!array_key_exists($path, $rotas)){
    http_response_code(404);
    exit();
}

session_start();

$isLoginRoute = stripos($path, 'login');

if(!isset($_SESSION['logado']) && $isLoginRoute === false){
    header('Location: /login');
    exit();
}

$classeControladora = $rotas[$path];
$controlador = new $classeControladora();
$controlador->processaRequisicao();
