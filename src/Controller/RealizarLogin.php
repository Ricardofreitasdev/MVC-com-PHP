<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\MessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Controller\InterfaceControladorReq;

class RealizarLogin implements InterfaceControladorReq
{

    use MessageTrait;

    private $repositorioDeUsuarios;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $usuario = $this->repositorioDeUsuarios->findOneBy(['email' => $email]);    

        $senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);     


        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
        $this->defineMensagem('danger', 'Email ou senha invalida');
            
            header("Location: /login");
            return;
        }

        $_SESSION['logado'] = true; 

        header("Location: /listar-cursos");
    }
}
