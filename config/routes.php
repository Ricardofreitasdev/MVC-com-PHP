<?php

use Alura\Cursos\Controller\{ExcluirCurso, FormularioCreate, ListarCursos, Persistencia};


return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioCreate::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => ExcluirCurso::class,

];
