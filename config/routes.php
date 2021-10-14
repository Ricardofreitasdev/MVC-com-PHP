<?php

use Alura\Cursos\Controller\FormularioCreate;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persistencia;

return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioCreate::class,
    '/salvar-curso' => Persistencia::class,
];

