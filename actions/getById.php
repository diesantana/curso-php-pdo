<?php

require_once('utils/functions.php');
require_once('pdo/Database.php');

// Busca o id enviado pela URL (método GET)
$id = $_GET['id'] ?? null;

// Verifica se o id é válido
if(empty($id) || $id <= 0) {
    die('Id do cliente não identificado');
}

// Cria uma instância da classe de conexão
$pdo = new Database();

// Cria a query SQL
$sql = 'SELECT id, nome, email FROM cliente WHERE id = :id';
$params = ['id' => $id];

// Executa a query
$cliente = $pdo->executeQueryOneRow($sql, $params);
// o resultado é um array associativo contendo os dados do cliente