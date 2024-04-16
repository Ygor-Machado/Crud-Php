<?php

// Definição da classe Aluno na model para abstração de dados
class Aluno
{
    // Propriedades da classe Aluno
    public $id;
    public $nome;
    public $sobrenome;
    public $idade;
    public $curso;
    public $sexo;
}

// Interface que define os métodos que uma classe DAO de usuário deve implementar
interface UsuarioDAOInterface
{
    // Método para criar um novo aluno
    public function create(Aluno $aluno);

    // Método para ler todos os alunos
    public function read();

    // Método para atualizar um aluno existente
    public function update(Aluno $aluno);

    // Método para excluir um aluno
    public function destroy(Aluno $aluno);

    // Método para encontrar um aluno pelo ID
    public function findById($id);
}
