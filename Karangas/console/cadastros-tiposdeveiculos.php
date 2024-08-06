<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "oracle.php";  // Inclua o arquivo de conexão com o banco de dados
include "fn/validar_sessao.php";  // Inclua o arquivo de validação de sessão

// Processa o formulário se for enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipovec = $_POST['tipovec'];
    $descricao = $_POST['descricao'];
    $exemplo_modelo = $_POST['exemplo_modelo'];
    $status = isset($_POST['status']) ? $_POST['status'] : 'A';

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO tipoveiculo (tipovec, descricao, exemplo_modelo, status) VALUES (?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('ssss', $tipovec, $descricao, $exemplo_modelo, $status);

    if ($stmt->execute()) {
        header("Location: cadastro-sucesso.php");
        exit;
    } else {
        echo "Erro ao cadastrar tipo de veículo.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Tipos de Veículo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Personalizado -->
    <link href="css/customizado.css" rel="stylesheet">
    <link rel="icon" type="logo" href="..\imagens\logo_karanga_icon.png">
</head>
<body>

    <div class="topnav-logo">
        <a href="index2.php" class="logo">
        <img class="logo-karanga" src="..\imagens\logo_karanga.png" alt="Logo Karanga">
        </a>
    </div>
    <!-- Topnav -->
    <div class="navbar">
        <a href="configuracoes.php" class="options">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icone-config" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
        </svg>
        </a>
        <nav class="topnav">
        <a href="index2.php">Home</a>
        <a href="cadastros-clientes.php">Clientes</a>
        <a href="cadastros-tiposdeveiculos.php" class="active">Tipos</a>
        <a href="cadastros-marcas.php">Marcas</a>
        <a href="cadastros-veiculos.php">Veículos</a>
        <a href="cadastros-acessoriosveiculos.php">Acessórios</a>
        <div class="botao-sair-direita">
            <a href="sair.php" class="botao-sair">Sair</a> <!-- Botão Sair -->
        </div>
        </nav>
    </div>

    <!-- Conteúdo -->
    <div class="conteudo">
        <h2>Cadastro de Tipos de Veículo</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="tipovec">Tipo de Veículo:</label>
                <input type="text" class="form-control" id="tipovec" name="tipovec" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao"></textarea>
            </div>
            <div class="form-group">
                <label for="exemplo_modelo">Exemplo de Modelo:</label>
                <input type="text" class="form-control" id="exemplo_modelo" name="exemplo_modelo">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <!-- Bootstrap JS e dependências opcionais -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.min.js"></script>
</body>
</html>
