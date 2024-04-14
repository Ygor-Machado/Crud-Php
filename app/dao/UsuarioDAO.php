<?php

class UsuarioDAO
{
    public function create(Usuario $usuario)
    {
        try {
            $sql = 'INSERT INTO aluno (nome, sobrenome, idade, curso, sexo) VALUES (:nome, :sobrenome, :idade, :curso, :sexo)';

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindParam(':nome', $usuario->nome);
            $stmt->bindParam(':sobrenome', $usuario->sobrenome);
            $stmt->bindParam(':idade', $usuario->idade);
            $stmt->bindParam(':curso', $usuario->curso);
            $stmt->bindParam(':sexo', $usuario->sexo);

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
                $array_lista[] = $this->listaUsuarios($l);
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
            return $this->listaUsuarios($row);
        } else {
            return null;
        }
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage());
    }
}

    public function update(Usuario $usuario)
    {
        try {
            $sql = "UPDATE aluno set
                
                  nome=:nome,
                  sobrenome=:sobrenome,
                  idade=:idade,
                  sexo=:sexo                  
                                                                       
                  WHERE id = :id";

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(":nome", $usuario->nome);
            $stmt->bindValue(":sobrenome", $usuario->sobrenome);
            $stmt->bindValue(":idade", $usuario->idade);
            $stmt->bindValue(":sexo", $usuario->sexo);
            $stmt->bindValue(":id", $usuario->id);

            return $stmt->execute();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());;
        }
    }

    public function destroy(Usuario $usuario)
    {
        try {
            $sql = 'DELETE FROM aluno WHERE id = :id';

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindParam(':id', $usuario->id);

            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    private function listaUsuarios($row)
    {
        $usuario = new Usuario();

        $usuario->id = $row['id'];
        $usuario->nome = $row['nome'];
        $usuario->sobrenome = $row['sobrenome'];
        $usuario->idade = $row['idade'];
        $usuario->curso = $row['curso'];
        $usuario->sexo = $row['sexo'];

        return $usuario;
    }
}