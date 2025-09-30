<?php

require_once('../utils/functions.php');
require_once('../pdo/Database.php');

// Captura os dados do formulário (método post)
$nome = $_POST['txtNome'] ?? null;
$email = $_POST['txtEmail'] ?? null;

// Verifica se os dados são válidos
if (empty(trim($nome)) || empty(trim($email))) {
    echo 'Os dados fornecidos são inválidos';
    return;
}

// Monta o esqueleto da constulta SQL
$sql = 'INSERT INTO cliente (nome, email) VALUES(:nome, :email)';

// Define os parâmetros (valores reais que substituirãos os parametros na consulta)
$params = [
    ':nome' => $nome,
    ':email' => $email
];

// Cria uma instância da classe de conexão
$pdo = new Database();

// Realiza a ação (INSERT)
$result = $pdo->executeNonQuery($sql, $params);

// Se a ação falhar, exibe uma mensagem para o usuário 
if(!$result) {
    echo 'Houve um erro ao tentar inserir um novo cliente';
    return;
}

// Se a ação foi concluída com sucesso, armazena o id do usuário inserido
$id = $pdo->getLastInsertId();

// Após concluir a ação, redireciona para a página de Editar, passando o id nos parâmetros da URL
redirect('../edit.php/?id='. $id);
