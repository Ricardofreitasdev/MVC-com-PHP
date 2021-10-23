<?php

namespace Alura\Cursos\Controller;
use Alura\Cursos\Controller\InterfaceControladorReq;
use Alura\Cursos\Helper\HtmlRender;

class Login  implements InterfaceControladorReq
{
    use HtmlRender;

    public function processaRequisicao(): void
    {
        echo $this->render('login/formulario', [
            'titulo' => 'Login'
        ]);
    }
}
