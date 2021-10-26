<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\HtmlRender;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Login implements RequestHandlerInterface
{
    use HtmlRender;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('login/formulario', [
            'titulo' => 'Login',
        ]);

        return new Response(200, [], $html);

    }
}
