<?php
// Incluir o cabeçalho
require_once('app/templates/header.php');

// Verifica se o parâmetro 'id' está presente na URL
if(isset($_GET['id'])) {
    // Obtém o ID do aluno da URL
    $id = $_GET['id'];

    // Recupera os dados do aluno do banco de dados usando o ID
    $aluno = $alunodao->findById($id);

    // Verifica se o aluno foi encontrado no banco de dados
    if(!$aluno) {
        // Se o aluno não foi encontrado, redireciona para a página inicial
        header('Location: /');
    }
}

?>

    <section>
    <a href="index.php">
        <button class="btn btn-success">Voltar</button>
    </a>
</section>

<form action="app/process/AlunoProcess.php" method="POST">
    <input type="hidden" name="id" value="<?= $aluno->id ?>">
    <div class="form-group">
        <label>Nome do Aluno:</label>
        <input type="text" class="form-control" name="nome" value="<?= $aluno->nome ?>">
    </div>

    <div class="form-group">
        <label>Sobrenome:</label>
        <input type="text" class="form-control" name="sobrenome" value="<?= $aluno->sobrenome ?>">
    </div>

    <div class="form-group">
        <label>Idade:</label>
        <input type="text" class="form-control" name="idade" value="<?= $aluno->idade ?>">
    </div>

    <div class="form-group">
        <label>Curso:</label>
        <input type="text" class="form-control" name="curso" value="<?= $aluno->curso ?>">
    </div>

    <div class="form-group">
        <label>Sexo:</label>
        <select name="sexo" class="form-control">
            <option value="M" <?= $aluno->sexo == 'M' ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?= $aluno->sexo == 'F' ? 'selected' : '' ?>>Feminino</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success" name="editar">Salvar Alterações</button>
    </div>

</form>

<?php
    require_once 'app/templates/footer.php';
?>