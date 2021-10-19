<?php
namespace Alura\Cursos\Entity;
class Usuario
{
 
    private $id;  
    private $email;  
    private $senha;

    public function senhaEstaCorreta(string $senhaPura): bool
    {
        return password_verify($senhaPura, $this->senha);
    }
}
