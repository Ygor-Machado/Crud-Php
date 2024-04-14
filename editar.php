<?php
// Incluir o cabeçalho
require_once('app/templates/header.php');


if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Recupera os dados do usuário do banco de dados usando o ID
    $usuario = $usuariodao->findById($id);

    if(!$usuario) {
        header('Location: /');
    }
}

?>

<section>
    <a href="index.php">
        <button class="btn btn-success">Voltar</button>
    </a>
</section>

<form action="app/process/UsuarioProcess.php" method="POST">
    <input type="hidden" name="id" value="<?= $usuario->id ?>">
    <div class="form-group">
        <label>Nome do Aluno:</label>
        <input type="text" class="form-control" name="nome" value="<?= $usuario->nome ?>">
    </div>

    <div class="form-group">
        <label>Sobrenome:</label>
        <input type="text" class="form-control" name="sobrenome" value="<?= $usuario->sobrenome ?>">
    </div>

    <div class="form-group">
        <label>Idade:</label>
        <input type="text" class="form-control" name="idade" value="<?= $usuario->idade ?>">
    </div>

    <div class="form-group">
        <label>Curso:</label>
        <input type="text" class="form-control" name="curso" value="<?= $usuario->curso ?>">
    </div>

    <div class="form-group">
        <label>Sexo:</label>
        <select name="sexo" class="form-control">
            <option value="M" <?= $usuario->sexo == 'M' ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?= $usuario->sexo == 'F' ? 'selected' : '' ?>>Feminino</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success" name="editar">Salvar Alterações</button>
    </div>

</form>

<?php
    require_once 'app/templates/footer.php';
?>