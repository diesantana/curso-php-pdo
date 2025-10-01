<?php

require_once('utils/functions.php');
require_once('pdo/Database.php');

// Cria da classe de conexão
$pdo = new Database();

// Cria a query SQL
$sql = 'SELECT id, nome, email FROM cliente ORDER BY nome';

// Executa a query
$listaClientes = $pdo->executeQuery($sql);
// o resultado é um array multidimencional, onde cada valor é um array associativo