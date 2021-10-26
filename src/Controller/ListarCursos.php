<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\HtmlRender;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListarCursos implements RequestHandlerInterface
{
    use HtmlRender;
    private $repositorioDeCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $cursos = $this->repositorioDeCursos->findAll();

        $html = $this->render('cursos/Listar', [
            'cursos' => $cursos,
            'titulo' => "Listar Cursos",
        ]);
        return new Response(200, [], $html);

    }
}
