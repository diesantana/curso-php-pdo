<?php
require_once('pdo/Config.php');
/**
 * Classe responsável pela comunicação com a base de dados
 */
class Database{
    private ?PDO $connection = null;

    /**
     * Método construtor que inicializa a propriedade connection
     * @return void
     */
    public function __construct() {
        $this->connection = $this->getConnection();
    }

    /**
     * Retorna a conexão com o banco de dados caso existe. Cria uma nova conexão caso não tenha nenhuma iniciada.
     * Documentação: 
     * https://www.php.net/manual/pt_BR/pdo.connections.php
     * https://www.php.net/manual/pt_BR/pdo.error-handling.php
     * https://www.php.net/manual/pt_BR/pdo.setattribute.php
     * https://www.php.net/manual/pt_BR/pdostatement.fetch.php
     * 
     * @return PDO
     */
    public function getConnection() :PDO {
        if($this->connection !== null) $this->connection; 
        return new PDO(DSN, USER, PASSWORD);
    }
}