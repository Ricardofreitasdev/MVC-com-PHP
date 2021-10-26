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

class Persistencia implements RequestHandlerInterface
{
    use MessageTrait;

    /**
     *
     * @var [instancia entityManager
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $descricao = filter_var(
            $request->getParsedBody()['descricao'],
            FILTER_SANITIZE_STRING
        );

        $curso = new Curso();
        $curso->setDescricao($descricao);
        $id = $request->getQueryParams()['id'];

        if (!is_null($id)) {
            $curso->setId($id);
            $this->entityManager->merge($curso);
            $this->defineMensagem('success', 'Curso Atualizado com sucesso');

        } else {
            $this->entityManager->persist($curso);
            $this->defineMensagem('success', 'Curso Criado com sucesso');
        }

        $this->entityManager->flush();

        $resposta = new Response(302, ['Location' => '/listar-cursos']);
        return $resposta;
    }
}
