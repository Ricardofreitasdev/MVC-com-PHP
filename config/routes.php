<?php

use Alura\Cursos\Controller\{ExcluirCurso,
    FormularioCreate,FormularioEditar, ListarCursos,
    Login, Logout, Persistencia, RealizarLogin};


return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioCreate::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => ExcluirCurso::class,
    '/alterar-curso' => FormularioEditar::class,
    '/realizar-login' => RealizarLogin::class,
    '/login' => Login::class,
    '/logout' => Logout::class,
    


];
