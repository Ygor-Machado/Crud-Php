<?php
class Conexao {

    public static $instance; // Variável estática para armazenar a instância da conexão

    private function __construct() {
        // Construtor privado para evitar a criação de instâncias desta classe
        // A conexão é estabelecida através do método estático getConexao()
    }

    public static function getConexao() {
        // Método estático para obter a instância da conexão
        if (!isset(self::$instance)) { // Verifica se a conexão já foi estabelecida

            // Se a instância não existe, cria uma nova conexão PDO
            self::$instance = new PDO('mysql:host=localhost;dbname=crud_junio', 'root', '1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            // Define o tratamento de erros para lançar exceções em caso de erro
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Define o comportamento para valores nulos do tipo string no Oracle para serem tratados como strings vazias
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        // Retorna a instância da conexão
        return self::$instance;
    }

}
