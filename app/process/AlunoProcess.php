<?php

// Inclui os arquivos necessários
include_once("../conexao/Conexao.php");
include_once("../model/Aluno.php");
include_once("../dao/AlunoDAO.php");

// instanciar as classes
$aluno = new Aluno(); // Instância da classe Aluno
$alunodao = new AlunoDAO(); // Instância da classe AlunoDAO

// Pega todos os dados por POST
$results = filter_input_array(INPUT_POST);

// Se a operação for gravar, entra nessa condição
if (isset($_POST['cadastrar'])) {

    // Define os atributos do objeto $aluno com os dados recebidos por POST
    $aluno->nome = $results['nome'];
    $aluno->sobrenome = $results['sobrenome'];
    $aluno->idade = $results['idade'];
    $aluno->curso = $results['curso'];
    $aluno->sexo = $results['sexo'];

    // Chama o método create do AlunoDAO para inserir o aluno no banco de dados
    $alunodao->create($aluno);

    // Redireciona para a página inicial
    header("Location: ../../");
}

// Se a requisição for editar
else if(isset($_POST['editar'])){

    // Define os atributos do objeto $aluno com os dados recebidos por POST
    $aluno->nome = $results['nome'];
    $aluno->sobrenome = $results['sobrenome'];
    $aluno->idade = $results['idade'];
    $aluno->sexo = $results['sexo'];
    $aluno->id = $results['id'];

    // Chama o método update do AlunoDAO para atualizar os dados do aluno no banco de dados
    $alunodao->update($aluno);

    // Redireciona para a página inicial
    header("Location: ../../");
}

// Se a requisição for excluir
else if(isset($_GET['excluir'])) {

    // Define o ID do aluno a ser excluído
    $aluno->id = $_GET['excluir'];

    // Chama o método destroy do AlunoDAO para excluir o aluno do banco de dados
    $alunodao->destroy($aluno);

    // Redireciona para a página inicial
    header("Location: ../../");
}
else{
    // Se nenhuma das condições anteriores for atendida, redireciona para a página inicial
    header("Location: ../../");
}
