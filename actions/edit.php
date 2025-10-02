<?php

require_once('../utils/functions.php');
require_once('../pdo/Database.php');

// Captura os dados do formulário (método post)
$nome = $_POST['txtNome'] ?? null;
$email = $_POST['txtEmail'] ?? null;
$id = $_GET['id'] ?? null;

// Verifica se os dados são válidos
if (empty(trim($nome)) || empty(trim($email)) || empty($id) || $id <= 0) {
    die('Os dados fornecidos são inválidos');
}

// Monta o esqueleto da constulta SQL
$sql = 'UPDATE cliente SET nome = :nome, email = :email WHERE id = :id';
// NUNCA ESQUEÇA DE UTILIZAR WHERE EM UPDATES OU DELETE

// Define os parâmetros (valores reais que substituirãos os parametros na consulta)
$params = [
    ':nome' => $nome,
    ':email' => $email,
    ':id' => $id
];

// Cria uma instância da classe de conexão
$pdo = new Database();

// Realiza a ação (UPDATE)
$result = $pdo->executeNonQuery($sql, $params);
// Utilizamos o executeNonQuery pois UPDATES são ações que não retornam nada
// assim como INSERT e DELETE

// Se a ação falhar, exibe uma mensagem para o usuário 
if(!$result) {
    die('Houve um erro ao tentar Atualizar um novo cliente');
}

// Após concluir a ação, redireciona novamente para a página de Editar, passando o id nos parâmetros da URL
// e uma mensagem de sucesso
redirect('/pdo-satellasoft/edit.php?id='. $id . '&msg="Dados atualizados com sucesso"');