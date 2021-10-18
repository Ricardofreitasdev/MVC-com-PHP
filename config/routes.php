<?php

use Alura\Cursos\Controller\{ExcluirCurso, FormularioCreate, FormularioEditar, ListarCursos, Persistencia};


return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioCreate::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => ExcluirCurso::class,
    '/alterar-curso' => FormularioEditar::class,


];
