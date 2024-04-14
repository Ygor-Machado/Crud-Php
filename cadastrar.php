<?php
    require_once('app/templates/header.php');
?>

<section>
    <a href="index.php">
        <button class="btn btn-success">Voltar</button>
    </a>
</section>

<form action="app/process/UsuarioProcess.php" method="POST">
    <div class="form-group">
        <label>Nome do Aluno:</label>
        <input type="text" class="form-control" name="nome">
    </div>

    <div class="form-group">
        <label>Sobrenome</label>
        <input type="text" class="form-control" name="sobrenome">
    </div>

    <div class="form-group">
        <label>Idade</label>
        <input type="text" class="form-control" name="idade">
    </div>

    <div class="form-group">
        <label>Curso</label>
        <input type="text" class="form-control" name="curso">
    </div>

    <div class="form-group">
        <label>Sexo</label>
        <select name="sexo" class="form-control">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success" name="cadastrar">Enviar</button>
    </div>

</form>
