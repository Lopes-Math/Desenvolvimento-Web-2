<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "oracle.php";  // Inclua o arquivo de conexão com o banco de dados
include "fn/validar_sessao.php";  // Inclua o arquivo de validação de sessão

// Processa o formulário se for enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idveiculo = $_POST['idveiculo'];
    $bancos = $_POST['bancos'];
    $portas = $_POST['portas'];
    $vidro_eletrico = isset($_POST['vidro_eletrico']) ? 1 : 0;
    $ar_condicionado = isset($_POST['ar_condicionado']) ? 1 : 0;
    $ar_quente_frio = isset($_POST['ar_quente_frio']) ? $_POST['ar_quente_frio'] : 'nenhum';
    $direcao_hidraulica = isset($_POST['direcao_hidraulica']) ? 1 : 0;
    $alarme = isset($_POST['alarme']) ? 1 : 0;
    $travas_eletricas = isset($_POST['travas_eletricas']) ? 1 : 0;
    $airbags = isset($_POST['airbags']) ? $_POST['airbags'] : 0;

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO veiculos_acessorios (idveiculo, vidro_eletrico, bancos, portas, ar_condicionado, ar_quente_frio, direcao_hidraulica, alarme, travas_eletricas, airbags)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('iissisiiii', $idveiculo, $vidro_eletrico, $bancos, $portas, $ar_condicionado, $ar_quente_frio, $direcao_hidraulica, $alarme, $travas_eletricas, $airbags);

    if ($stmt->execute()) {
        header("Location: cadastro-sucesso.php");
        exit;
    } else {
        echo "Erro ao cadastrar acessórios para o veículo.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Acessórios para Veículos</title>
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
        <a href="cadastros-tiposdeveiculos.php">Tipos</a>
        <a href="cadastros-marcas.php">Marcas</a>
        <a href="cadastros-veiculos.php">Veículos</a>
        <a href="cadastros-acessoriosveiculos.php" class="active">Acessórios</a>
        <div class="botao-sair-direita">
            <a href="sair.php" class="botao-sair">Sair</a> <!-- Botão Sair -->
        </div>
        </nav>
    </div>

    <!-- Conteúdo -->
    <div class="conteudo">
        <h2>Cadastro de Acessórios para Veículos</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="idveiculo">Veículo:</label>
                <!-- Substitua o campo input por um dropdown ou autocomplete para selecionar o veículo -->
                <input type="text" class="form-control" id="idveiculo" name="idveiculo" required>
            </div>
            <div class="form-group">
                <label for="vidro_eletrico">Vidro Elétrico:</label>
                <input type="checkbox" class="form-check-input" id="vidro_eletrico" name="vidro_eletrico" value="1">
            </div>
            <div class="form-group">
                <label for="bancos">Bancos:</label>
                <input type="text" class="form-control" id="bancos" name="bancos" required>
            </div>
            <div class="form-group">
                <label for="portas">Portas:</label>
                <input type="number" class="form-control" id="portas" name="portas" required>
            </div>
            <div class="form-group">
                <label for="ar_condicionado">Ar Condicionado:</label>
                <input type="checkbox" class="form-check-input" id="ar_condicionado" name="ar_condicionado" value="1">
            </div>
            <div class="form-group">
                <label for="ar_quente_frio">Ar Quente/Frio:</label>
                <input type="text" class="form-control" id="ar_quente_frio" name="ar_quente_frio" required>
            </div>
            <div class="form-group">
                <label for="direcao_hidraulica">Direção Hidráulica:</label>
                <input type="checkbox" class="form-check-input" id="direcao_hidraulica" name="direcao_hidraulica" value="1">
            </div>
            <div class="form-group">
                <label for="alarme">Alarme:</label>
                <input type="checkbox" class="form-check-input" id="alarme" name="alarme" value="1">
            </div>
            <div class="form-group">
                <label for="travas_eletricas">Travas Elétricas:</label>
                <input type="checkbox" class="form-check-input" id="travas_eletricas" name="travas_eletricas" value="1">
            </div>
            <div class="form-group">
                <label for="airbags">Airbags:</label>
                <input type="number" class="form-control" id="airbags" name="airbags" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <!-- Bootstrap JS e dependências opcionais -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.min.js"></script>
</body>
</html>
