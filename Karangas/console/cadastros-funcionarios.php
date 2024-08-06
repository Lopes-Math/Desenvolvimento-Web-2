<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "oracle.php";  // Inclua o arquivo de conexão com o banco de dados
include "fn/validar_sessao.php";  // Inclua o arquivo de validação de sessão
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionários</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Personalizado -->
    <link href="css/customizado.css" rel="stylesheet">
</head>
<body>
    <!-- Topnav -->
    <nav class="topnav">
        <div class="left-links">
            <a href="index2.php" class="active">Home</a>
            <a href="cadastros-funcionarios.php">Funcionários</a>
            <a href="cadastros-usuarios.php">Usuários</a>
            <a href="cadastros-clientes.php">Clientes</a>
            <a href="cadastros-tiposdeveiculos.php">Tipos de Veículos</a>
            <a href="cadastros-marcas.php">Marcas</a>
            <a href="cadastros-veiculos.php">Veículos</a>
            <a href="cadastros-acessoriosveiculos.php">Acessórios de Veículos</a>
        </div>
        <a href="sair.php" class="botao-sair">Sair</a> <!-- Botão Sair -->
    </nav>

    <!-- Conteúdo -->
    <div class="conteudo">
        <h2>Cadastro de Funcionários</h2>
        <form action="processa_cadastro_funcionarios.php" method="post">
            <div class="form-group">
                <label for="nome_completo">Nome Completo:</label>
                <input type="text" class="form-control" id="nome_completo" name="nome_completo" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <!-- Bootstrap JS e dependências opcionais -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.min.js"></script>
</body>
</html>