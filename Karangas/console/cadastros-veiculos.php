<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "oracle.php";  // Inclua o arquivo de conexão com o banco de dados
include "fn/validar_sessao.php";  // Inclua o arquivo de validação de sessão

// Processa o formulário se for enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idmarca = $_POST['idmarca'];
    $idtipo = $_POST['idtipo'];
    $idcliente = $_POST['idcliente'];
    $modelo = $_POST['modelo'];
    $ano_fab = $_POST['ano_fab'];
    $ano_mod = $_POST['ano_mod'];
    $valorin = $_POST['valorin'];
    $valorout = $_POST['valorout'];
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];
    $combustivel = $_POST['combustivel'];
    $tipocambio = $_POST['tipocambio'];
    $renavam = $_POST['renavam'];
    $quilometragem = $_POST['quilometragem'];
    $descricao = $_POST['descricao'];
    $status = isset($_POST['status']) ? $_POST['status'] : 'A';

    // Validação do ID Cliente
    if (!is_numeric($idcliente)) {
        echo "ID Cliente deve conter apenas números.";
        exit;
    }

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO veiculos (idmarca, idtipo, idcliente, modelo, ano_fab, ano_mod, valorin, valorout, placa, cor, combustivel, tipocambio, renavam, quilometragem, descricao, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('iiissssdsssssiss', $idmarca, $idtipo, $idcliente, $modelo, $ano_fab, $ano_mod, $valorin, $valorout, $placa, $cor, $combustivel, $tipocambio, $renavam, $quilometragem, $descricao, $status);

    if ($stmt->execute()) {
        header("Location: cadastro-sucesso.php");
        exit;
    } else {
        echo "Erro ao cadastrar veículo.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veículos</title>
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
        <a href="cadastros-veiculos.php" class="active">Veículos</a>
        <a href="cadastros-acessoriosveiculos.php">Acessórios</a>
        <div class="botao-sair-direita">
            <a href="sair.php" class="botao-sair">Sair</a> <!-- Botão Sair -->
        </div>
        </nav>
    </div>

    <!-- Conteúdo -->
    <div class="conteudo">
        <h2>Cadastro de Veículos</h2>
        <form action="" method="post">
        <div class="form-group">
            <label for="idmarca">Marca:</label>
            <select class="form-control" id="idmarca" name="idmarca" required>
                <?php
                $marcas = getMarcas();
                foreach ($marcas as $idmarca => $marca) {
                    echo "<option value=\"$idmarca\">$marca</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="idtipo">Tipo:</label>
            <select class="form-control" id="idtipo" name="idtipo" required>
                <?php
                $tiposVeiculos = getTiposVeiculos();
                foreach ($tiposVeiculos as $idtipo => $tipoVeiculo) {
                    echo "<option value=\"$idtipo\">" . $tipoVeiculo['tipovec'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="idcliente">Código do Cliente:</label>
            <input type="number" class="form-control" id="idcliente" name="idcliente" required>
        </div>
            <!-- Adicione os campos restantes do formulário de acordo com a estrutura da tabela veiculos: -->
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>
            <div class="form-group">
                <label for="ano_fab">Ano de Fabricação:</label>
                <input type="text" class="form-control" id="ano_fab" name="ano_fab" required>
            </div>
            <div class="form-group">
                <label for="ano_mod">Ano do Modelo:</label>
                <input type="text" class="form-control" id="ano_mod" name="ano_mod" required>
            </div>
            <div class="form-group">
                <label for="valorin">Valor de Entrada:</label>
                <input type="text" class="form-control" id="valorin" name="valorin" required>
            </div>
            <div class="form-group">
                <label for="valorout">Valor de Saída:</label>
                <input type="text" class="form-control" id="valorout" name="valorout" required>
            </div>
            <div class="form-group">
                <label for="placa">Placa:</label>
                <input type="text" class="form-control" id="placa" name="placa" required>
            </div>
            <div class="form-group">
                <label for="cor">Cor:</label>
                <input type="text" class="form-control" id="cor" name="cor" required>
            </div>
            <div class="form-group">
                <label for="combustivel">Combustível:</label>
                <input type="text" class="form-control" id="combustivel" name="combustivel" required>
            </div>
            <div class="form-group">
                <label for="tipocambio">Tipo de Câmbio:</label>
                <input type="text" class="form-control" id="tipocambio" name="tipocambio" required>
            </div>
            <div class="form-group">
                <label for="renavam">Renavam:</label>
                <input type="text" class="form-control" id="renavam" name="renavam" required>
            </div>
            <div class="form-group">
                <label for="quilometragem">Quilometragem:</label>
                <input type="number" class="form-control" id="quilometragem" name="quilometragem" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao"></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="A">Ativo</option>
                    <option value="I">Inativo</option>
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