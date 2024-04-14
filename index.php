<?php
require_once('app/templates/header.php');
?>

    <main>

        <section>
            <a href="cadastrar.php">
                <button class="btn btn-success">Cadastrar Aluno</button>
            </a>
        </section>

        <section>
            <table class="table bg-light mt-3">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>idade</th>
                    <th>Curso</th>
                    <th>Sexo</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
               <?php foreach ($alunodao->read() as $aluno) : ?>
                        <tr>
                            <td><?= $aluno->id ?></td>
                            <td><?= $aluno->nome ?></td>
                            <td><?= $aluno->sobrenome ?></td>
                            <td><?= $aluno->idade ?></td>
                            <td><?= $aluno->curso ?></td>
                            <td><?= $aluno->sexo ?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?= $aluno->id ?>">
                                    <button class="btn btn-warning btn-sm" name="editar">Editar</button>
                                </a>
                                <a href="app/process/AlunoProcess.php?excluir=<?= $aluno->id ?>">
                                    <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>
               <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>


<?php
require_once('app/templates/footer.php');
?>