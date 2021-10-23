<?php

namespace Alura\Cursos\Controller;
use Alura\Cursos\Controller\InterfaceControladorReq;

class Logout implements InterfaceControladorReq
{

    public function processaRequisicao(): void
    {
        session_destroy();
        header("Location: /login");
    }
}
