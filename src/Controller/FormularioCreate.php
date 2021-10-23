<?php

namespace Alura\Cursos\Controller;
use Alura\Cursos\Helper\HtmlRender;


class FormularioCreate implements InterfaceControladorReq
{

    use HtmlRender;

    public function processaRequisicao(): void
    {
        echo $this->render('cursos/Formulario', [
            'titulo' => "Novo Curso"
        ]);
    }
}
