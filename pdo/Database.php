<?php
require_once('Config.php');
/**
 * Classe responsável pela comunicação com a base de dados
 */
class Database
{
    private ?PDO $connection = null; // Este atributo vai armazenar a conexão atual com a base de dados

    /**
     * Método construtor que inicializa a propriedade connection
     * @return void
     */
    public function __construct()
    {
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
    public function getConnection(): PDO
    {
        if ($this->connection !== null) {
            return $this->connection;
        }

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // erros como exceções
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // arrays associativos por padrão
            PDO::ATTR_EMULATE_PREPARES   => false,                  // prepared statements nativos
        ];
        return new PDO(DSN, USER, PASSWORD, $options);
    }

    /**
     * Executa queries que não retornam nenhum dado (INSERT, UPDATE, DELETE)
     * @return bool
     */
    public function executeNonQuery(string $sql, array $params = []): bool
    {
        try {
            // Prepara a consulta SQL
            $stmt = $this->connection->prepare($sql);

            // Executa a consulta com os parâmetros passados
            return $stmt->execute($params);  // Retorna true ou false
        } catch (PDOException $ex) {
            // Em caso de erro, captura a exceção e exibe a mensagem de erro
            echo 'Erro!' . $ex->getMessage();

            // Retorna false se houver erro
            return false;
        }
    }

    /**
     * Executa queries SQL que retornam um array de valores
     * @param string $sql Esqueleto da consulta SQL
     * @param array $params Parametros da consulta SQL
     * @return array
     */
    public function executeQuery(string $sql, array $params = []): array
    {
        try {
            // Prepara a consulta SQL
            $stmt = $this->connection->prepare($sql);

            // Executa a consulta com os parâmetros passados
            $stmt->execute($params);

            // Retorna os dados 
            return $stmt->fetchAll();
            // FetchAll Retorna todos os resultados da query

        } catch (PDOException $ex) {
            // Em caso de erro, captura a exceção e exibe a mensagem de erro
            echo 'Erro!' . $ex->getMessage();

            // Retorna um array vazio se houver erro
            return [];
        }
    }

    /**
     * Executa queries SQL que retornam um único registro
     * @param string $sql Esqueleto da consulta SQL
     * @param array $params Parametros da consulta SQL
     * @return array
     */
    public function executeQueryOneRow(string $sql, array $params = []): array
    {
        try {
            // Prepara a consulta SQL
            $stmt = $this->connection->prepare($sql);

            // Executa a consulta com os parâmetros passados
            $stmt->execute($params);

            // Retorna os dados 
            return $stmt->fetch();
            // Fetch Retorna a primeira ocorrência da query

        } catch (PDOException $ex) {
            // Em caso de erro, captura a exceção e exibe a mensagem de erro
            echo 'Erro!' . $ex->getMessage();

            // Retorna um array vazio se houver erro
            return [];
        }
    }

    /**
     * Retorna o ID do último dado inserido na base de dados 
     * @return int
     */
    public function getLastInsertId(): int
    {
        return (int) $this->connection->lastInsertId();
    }
}
