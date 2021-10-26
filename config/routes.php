<?php

use Alura\Cursos\Controller\ExcluirCurso;
use Alura\Cursos\Controller\FormularioCreate;
use Alura\Cursos\Controller\FormularioEditar;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Login;
use Alura\Cursos\Controller\Logout;
use Alura\Cursos\Controller\Persistencia;
use Alura\Cursos\Controller\RealizarLogin;

return [
    '/listar-cursos'  => ListarCursos::class,
    '/novo-curso'     => FormularioCreate::class,
    '/salvar-curso'   => Persistencia::class,
    '/excluir-curso'  => ExcluirCurso::class,
    '/alterar-curso'  => FormularioEditar::class,
    '/realizar-login' => RealizarLogin::class,
    '/login'          => Login::class,
    '/logout'         => Logout::class,

];
