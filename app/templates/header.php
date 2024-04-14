<?php
    include_once "./app/conexao/Conexao.php";
    include_once "./app/model/Usuario.php";
    include_once "./app/dao/UsuarioDAO.php";

    // instanciar as classes
    $usuario = new Usuario();
    $usuariodao = new UsuarioDAO();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Ygao Cadastros</title>
</head>
<body class="bg-dark text-light">

<div class="container">
    <div class="jumbotron bg-danger">
        <h1>Ygao Cadastros</h1>
        <p>Exemplo de crud para apresentar na sala</p>
    </div>





