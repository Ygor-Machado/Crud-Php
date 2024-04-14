<?php

include_once("../conexao/Conexao.php");
include_once("../model/Aluno.php");
include_once("../dao/AlunoDAO.php");

// instanciar as classes
$aluno = new Aluno();
$alunodao = new AlunoDAO();

//pega todos os dados por POST

$results = filter_input_array(INPUT_POST);

// se a operação for gravar entra nessa condição
if (isset($_POST['cadastrar'])) {

    $aluno->nome = $results['nome'];
    $aluno->sobrenome = $results['sobrenome'];
    $aluno->idade = $results['idade'];
    $aluno->curso = $results['curso'];
    $aluno->sexo = $results['sexo'];

    $alunodao->create($aluno);

    header("Location: ../../");
}

// se a requisição for editar
else if(isset($_POST['editar'])){

    $aluno->nome = $results['nome'];
    $aluno->sobrenome = $results['sobrenome'];
    $aluno->idade = $results['idade'];
    $aluno->sexo = $results['sexo'];
    $aluno->id = $results['id'];

    $alunodao->update($aluno);

    header("Location: ../../");
}

else if(isset($_GET['excluir'])) {

    $aluno->id = $_GET['excluir'];

    $alunodao->destroy($aluno);

    header("Location: ../../");
}
else{
    header("Location: ../../");
}