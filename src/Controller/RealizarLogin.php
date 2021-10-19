<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Controller\InterfaceControladorReq;

class RealizarLogin implements InterfaceControladorReq
{

    private $repositorioDeUsuarios;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if(is_null($email) || $email === false){
            echo "email invalido";
            return;
        }

        $senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if(is_null($email) || $email === false){
            echo "email invalido";
            return;
        }


        var_dump($email);
        exit();

        // $usuario = $this->repositorioDeUsuarios->findOneBy($email);
        // $usuario->senhaEstaCorreta($senha);

        // if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
        //     echo "Senha invalidos";
        //     return;
        // }

        // header("Location: /listar-cursos");
    }
}
