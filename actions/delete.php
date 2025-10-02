<?php
require_once('../utils/functions.php'); // Funções auxiliares
require_once('../pdo/Database.php');    // Classe Database (PDO)

// Pega o id que será deletado 
$id = $_GET['id'] ?? null;

// Verifica se o id é válido, se não exibe uma msg de erro
if(!is_numeric($id) || $id <= 0) {
    die('Os dados fornecidos são inválidos!');
}

// Monta a query SQL 
$sql = 'DELETE FROM cliente WHERE id = :id';

// Parâmetros da query 
$param = [':id' => $id];

// Instancia a classe responsável pela conexão (PDO)
$pdo = new Database();

// Executa a ação
$result = $pdo->executeNonQuery($sql, $param);

// Verifica se a ação foi concluída com sucesso, se não exibe uma msg de erro
if(!$result) {
    die('Houve um erro ao tentar deletar o cliente');
}

// Redireciona para o index.php (Página que lista os clientes)
// Neste caso o id deletado não é passado nos parâmetros da URL
redirect('/pdo-satellasoft/index.php');

