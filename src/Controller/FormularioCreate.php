<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\HtmlRender;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioCreate implements RequestHandlerInterface
{

    use HtmlRender;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('cursos/Formulario', [
            'titulo' => "Novo Curso",
        ]);

        return new Response(200, [], $html);

    }
}
