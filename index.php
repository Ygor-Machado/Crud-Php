<?php
    require_once('app/templates/header.php');
?>

    <main>

        <section>
            <a href="cadastrar.php">
                <button class="btn btn-success">Cadastrar Vaga</button>
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
               <?php foreach ($usuariodao->read() as $usuario) : ?>
                        <tr>
                            <td><?= $usuario->id ?></td>
                            <td><?= $usuario->nome ?></td>
                            <td><?= $usuario->sobrenome ?></td>
                            <td><?= $usuario->idade ?></td>
                            <td><?= $usuario->curso ?></td>
                            <td><?= $usuario->sexo ?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?= $usuario->id ?>">
                                    <button class="btn btn-warning btn-sm" name="editar">Editar</button>
                                </a>
                                <a href="app/process/UsuarioProcess.php?excluir=<?= $usuario->id ?>">
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