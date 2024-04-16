<?php

class AlunoDAO implements UsuarioDAOInterface
{
    // Método para criar um novo aluno no banco de dados
    public function create(Aluno $aluno)
    {
        try {
            $sql = 'INSERT INTO aluno (nome, sobrenome, idade, curso, sexo) VALUES (:nome, :sobrenome, :idade, :curso, :sexo)';

            // Prepara a consulta SQL
            $stmt = Conexao::getConexao()->prepare($sql);

            // Substitui os parâmetros da consulta pelos valores do aluno
            $stmt->bindParam(':nome', $aluno->nome);
            $stmt->bindParam(':sobrenome', $aluno->sobrenome);
            $stmt->bindParam(':idade', $aluno->idade);
            $stmt->bindParam(':curso', $aluno->curso);
            $stmt->bindParam(':sexo', $aluno->sexo);

            // Executa a consulta
            $stmt->execute();

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    // Método para ler todos os alunos do banco de dados
    public function read()
    {
        try {
            $sql = 'SELECT * FROM aluno';

            // Executa a consulta SQL
            $result = Conexao::getConexao()->query($sql);


            $lista = $result->fetchAll(PDO::FETCH_ASSOC);

            $array_lista = array();

            // Transforma em objetos Aluno
            foreach ($lista as $l) {
                $array_lista[] = $this->listaAlunos($l);
            }

            return $array_lista;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    // Método para encontrar um aluno pelo ID
    public function findById($id)
    {
        try {
            $sql = 'SELECT * FROM aluno WHERE id = :id';

            // Prepara a consulta SQL
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // Obtém o resultado como uma matriz associativa
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return $this->listaAlunos($row);
            } else {
                return null;
            }
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    // Método para atualizar um aluno no banco de dados
    public function update(Aluno $aluno)
    {
        try {
            $sql = "UPDATE aluno SET nome=:nome, sobrenome=:sobrenome, idade=:idade, sexo=:sexo WHERE id = :id";

            // Prepara a consulta SQL
            $stmt = Conexao::getConexao()->prepare($sql);

            // Substitui os parâmetros da consulta pelos valores do aluno
            $stmt->bindValue(":nome", $aluno->nome);
            $stmt->bindValue(":sobrenome", $aluno->sobrenome);
            $stmt->bindValue(":idade", $aluno->idade);
            $stmt->bindValue(":sexo", $aluno->sexo);
            $stmt->bindValue(":id", $aluno->id);

            // Executa a consulta
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    // Método para excluir um aluno do banco de dados
    public function destroy(Aluno $aluno)
    {
        try {
            $sql = 'DELETE FROM aluno WHERE id = :id';

            // Prepara a consulta SQL
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindParam(':id', $aluno->id);

            // Executa a consulta
            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    // Método privado para criar um objeto Aluno
    private function listaAlunos($row)
    {
        $aluno = new Aluno();

        $aluno->id = $row['id'];
        $aluno->nome = $row['nome'];
        $aluno->sobrenome = $row['sobrenome'];
        $aluno->idade = $row['idade'];
        $aluno->curso = $row['curso'];
        $aluno->sexo = $row['sexo'];

        return $aluno;
    }
}
