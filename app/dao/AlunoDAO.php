<?php

class AlunoDAO implements UsuarioDAOInterface
{
    public function create(Aluno $aluno)
    {
        try {
            $sql = 'INSERT INTO aluno (nome, sobrenome, idade, curso, sexo) VALUES (:nome, :sobrenome, :idade, :curso, :sexo)';

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindParam(':nome', $aluno->nome);
            $stmt->bindParam(':sobrenome', $aluno->sobrenome);
            $stmt->bindParam(':idade', $aluno->idade);
            $stmt->bindParam(':curso', $aluno->curso);
            $stmt->bindParam(':sexo', $aluno->sexo);

            $stmt->execute();

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    public function read()
    {
        try {
            $sql = 'SELECT * FROM aluno';

            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);

            $array_lista = array();

            foreach ($lista as $l) {
                $array_lista[] = $this->listaAlunos($l);
            }

            return $array_lista;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

public function findById($id)
{
    try {
        $sql = 'SELECT * FROM aluno WHERE id = :id';

        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

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

    public function update(Aluno $aluno)
    {
        try {
            $sql = "UPDATE aluno set
                
                  nome=:nome,
                  sobrenome=:sobrenome,
                  idade=:idade,
                  sexo=:sexo                  
                                                                       
                  WHERE id = :id";

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(":nome", $aluno->nome);
            $stmt->bindValue(":sobrenome", $aluno->sobrenome);
            $stmt->bindValue(":idade", $aluno->idade);
            $stmt->bindValue(":sexo", $aluno->sexo);
            $stmt->bindValue(":id", $aluno->id);

            return $stmt->execute();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    public function destroy(Aluno $aluno)
    {
        try {
            $sql = 'DELETE FROM aluno WHERE id = :id';

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindParam(':id', $aluno->id);

            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    private function listaAlunos($row)
    {
        $usuario = new Aluno();

        $usuario->id = $row['id'];
        $usuario->nome = $row['nome'];
        $usuario->sobrenome = $row['sobrenome'];
        $usuario->idade = $row['idade'];
        $usuario->curso = $row['curso'];
        $usuario->sexo = $row['sexo'];

        return $usuario;
    }
}