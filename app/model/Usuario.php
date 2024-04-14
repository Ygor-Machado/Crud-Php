<?php

class Usuario
{
    public $id;
    public $nome;
    public $sobrenome;
    public $idade;
    public $curso;
    public $sexo;
}

interface UsuarioDAOInterface
{
    public function create(Usuario $usuario);
    public function read();
    public function update(Usuario $usuario);
    public function destroy(Usuario $usuario);
    public function findById($id);
}