<?php

class Aluno
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
    public function create(Aluno $aluno);
    public function read();
    public function update(Aluno $aluno);
    public function destroy(Aluno $aluno);
    public function findById($id);
}