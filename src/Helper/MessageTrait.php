<?php

namespace Alura\Cursos\Helper;

trait MessageTrait
{

    public function defineMensagem(string $tipo, string $mensagem)
    {
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['tipo_mensagem'] = $tipo;

    }
    
}
