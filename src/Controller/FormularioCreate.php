<?php
namespace Alura\Cursos\Controller;


class FormularioCreate implements InterfaceControladorReq {
    

    public function processaRequisicao(): void
    {
        $titulo = "Novo Curso";
        require __DIR__ . '/../../view/cursos/Formulario.php';
    }
}