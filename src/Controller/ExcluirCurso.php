<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\MessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ExcluirCurso implements RequestHandlerInterface
{

    use MessageTrait;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $id       = $request->getQueryParams()['id'];
        $resposta = new Response(302, ['Location' => '/listar-cursos']);

        if (is_null($id)) {
            $this->defineMensagem('danger', 'Curso inexistente');
            header("Location: /listar-cursos");
            return $resposta;
        }

        $curso = $this->entityManager->getReference(Curso::class, $id);

        $this->entityManager->remove($curso);
        $this->entityManager->flush();
        $this->defineMensagem('success', 'Curso excluído com sucesso');

        return $resposta;

    }
}
