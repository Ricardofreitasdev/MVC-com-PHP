<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\HtmlRender;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEditar implements RequestHandlerInterface
{
    use HtmlRender;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorioDeCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getQueryParams()['id'];

        if (is_null($id) || $id === false) {
            header("Location: /listar-cursos");
            $resposta = new Response(302, ['Location' => '/listar-cursos']);
            return $resposta;
        }

        $curso = $this->repositorioDeCursos->find($id);

        $html = $this->render('cursos/Formulario', [
            'curso'  => $curso,
            'titulo' => 'Alterar Curso ' . $curso->getDescricao(),
        ]);

        $resposta = new Response(302, [], $html);
        return $resposta;

    }
}
