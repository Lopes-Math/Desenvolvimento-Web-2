<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "oracle.php";  // Inclua o arquivo de conexão com o banco de dados
include "fn/validar_sessao.php";  // Inclua o arquivo de validação de sessão

// Processa o formulário se for enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $observacao = $_POST['observacao'];
    $dt_criacao = date('Y-m-d');

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO clientes (cpf, nome, email, telefone, endereco, complemento, bairro, cidade, estado, cep, dt_criacao, observacao)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('ssssssssssss', $cpf, $nome, $email, $telefone, $endereco, $complemento, $bairro, $cidade, $estado, $cep, $dt_criacao, $observacao);

    if ($stmt->execute()) {
        header("Location: cadastro-sucesso.php");
        exit;
    } else {
        echo "Erro ao cadastrar cliente.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
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
        <a href="cadastros-clientes.php" class="active">Clientes</a>
        <a href="cadastros-tiposdeveiculos.php">Tipos</a>
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
        <h2>Cadastro de Clientes</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
            </div>
            <div class="form-group">
                <label for="complemento">Complemento:</label>
                <input type="text" class="form-control" id="complemento" name="complemento">
            </div>
            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" class="form-control" id="bairro" name="bairro" required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" id="cidade" name="cidade" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado" required>
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" class="form-control" id="cep" name="cep" required>
            </div>
            <div class="form-group">
                <label for="observacao">Observação:</label>
                <input type="text" class="form-control" id="observacao" name="observacao">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <!-- Bootstrap JS e dependências opcionais -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.min.js"></script>
</body>
</html>
