<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "oracle.php";  // Inclua o arquivo de conexão com o banco de dados
include "fn/validar_sessao.php";  // Inclua o arquivo de validação de sessão

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $data_cadastro = date('Y-m-d H:i:s');
    $data_alteracao = $data_cadastro;
    $situacao = '1'; // Valor padrão

    $sql = "INSERT INTO funcionarios (nome_completo, email, data_cadastro, data_alteracao, situacao) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssss", $nome_completo, $email, $data_cadastro, $data_alteracao, $situacao);

    if ($stmt->execute()) {
        echo "Funcionário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar funcionário: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "Método de requisição inválido.";
}
?>