<?php

include_once("../conexao/Conexao.php");
include_once("../model/Usuario.php");
include_once("../dao/UsuarioDAO.php");

// instanciar as classes
$usuario = new Usuario();
$usuariodao = new UsuarioDAO();

//pega todos os dados por POST

$results = filter_input_array(INPUT_POST);

// se a operação for gravar entra nessa condição
if (isset($_POST['cadastrar'])) {

    $usuario->nome = $results['nome'];
    $usuario->sobrenome = $results['sobrenome'];
    $usuario->idade = $results['idade'];
    $usuario->curso = $results['curso'];
    $usuario->sexo = $results['sexo'];

    $usuariodao->create($usuario);

    header("Location: ../../");
}

// se a requisição for editar
else if(isset($_POST['editar'])){

    $usuario->nome = $results['nome'];
    $usuario->sobrenome = $results['sobrenome'];
    $usuario->idade = $results['idade'];
    $usuario->sexo = $results['sexo'];
    $usuario->id = $results['id'];

    $usuariodao->update($usuario);

    header("Location: ../../");
}

else if(isset($_GET['excluir'])) {

    $usuario->id = $_GET['excluir'];

    $usuariodao->destroy($usuario);

    header("Location: ../../");
}
else{
    header("Location: ../../");
}