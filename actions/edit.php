<?php

require_once('../utils/functions.php');
require_once('../pdo/Database.php');

// Captura os dados do formulário (método post)
$nome = $_POST['txtNome'] ?? null;
$email = $_POST['txtEmail'] ?? null;
$id = $_GET['id'] ?? null;

// Verifica se os dados são válidos
if (empty(trim($nome)) || empty(trim($email)) || empty($id) || $id <= 0) {
    echo 'Os dados fornecidos são inválidos';
    return;
}

// Monta o esqueleto da constulta SQL
// NUNCA ESQUEÇA DE UTILIZAR WHERE EM UPDATES OU DELETE
$sql = 'UPDATE cliente SET nome = :nome, email = :email WHERE id = :id';

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
    echo 'Houve um erro ao tentar Atualizar um novo cliente';
    return;
}

// Após concluir a ação, redireciona novamente para a página de Editar, passando o id nos parâmetros da URL
// e uma mensagem de sucesso
redirect('../edit.php/?id='. $id . '&msg="Dados atualizados com sucesso"');