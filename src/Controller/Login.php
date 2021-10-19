<?php

namespace Alura\Cursos\Controller;
use Alura\Cursos\Controller\ControllerHtml;
use Alura\Cursos\Controller\InterfaceControladorReq;

class Login extends ControllerHtml implements InterfaceControladorReq
{

    public function processaRequisicao(): void
    {
        echo $this->render('login/formulario', [
            'titulo' => 'Login'
        ]);
    }
}
