<?php

namespace Alura\Cursos\Controller;


class FormularioCreate extends ControllerHtml implements InterfaceControladorReq
{


    public function processaRequisicao(): void
    {
        echo $this->render('cursos/Formulario', [
            'titulo' => "Novo Curso"
        ]);
    }
}
