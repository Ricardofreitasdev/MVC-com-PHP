<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\MessageTrait;

use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Controller\InterfaceControladorReq;

class Persistencia implements InterfaceControladorReq
{
    use MessageTrait;

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {

        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

        $curso = new Curso();
        $curso->setDescricao($descricao);

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!is_null($id)) {
            $curso->setId($id);
            $this->entityManager->merge($curso);
            $this->defineMensagem('success', 'Curso Atualizado com sucesso');

        } else {
            $this->entityManager->persist($curso);
            $this->defineMensagem('success', 'Curso Criado com sucesso');
        }

        $this->entityManager->flush();
        header("Location: /listar-cursos", true, 302);
    }
}
