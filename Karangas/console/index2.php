<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "oracle.php";
include "fn/validar_sessao.php"; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Karangas Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
  <!-- CSS Personalizado -->
  <link href="./css/customizado.css" rel="stylesheet">
  <link rel="icon" type="logo" href="..\imagens\logo_karanga_icon.png">
</head>
<body>

<div class="topnav-logo">
    <a href="index2.php" class="logo">
    <img class="logo-karanga" src="..\imagens\logo_karanga.png" alt="Logo Karanga">
    </a>
</div>

<div class="navbar">
  <!-- Topnav -->
    <a href="configuracoes.php" class="options">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icone-config" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
      </svg>
    </a>
    <nav class="topnav">
      <a href="index2.php" class="active">Home</a>
      <a href="cadastros.php">Cadastros</a>
      <a href="..\index.php">Anúncios</a>  
      <div class="botao-sair-direita">
        <a href="sair.php" class="botao-sair">Sair</a> <!-- Botão Sair -->
      </div>
    </nav>
</div>

<!-- Conteúdo -->
<div class="conteudo">
  <h2>Dashboard</h2>
  <?php
    // Verifica se $_SESSION["msg"] não é nulo e imprime a mensagem
    if(isset($_SESSION["msg"]) && $_SESSION["msg"] !== null) 
     {
        echo $_SESSION["msg"];
        // Limpa a mensagem para evitar que seja exibida novamente
        $_SESSION["msg"] = null;
     }
  ?>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod dolor nec magna bibendum, nec rutrum justo condimentum. Vivamus non libero at nisl fermentum varius. Phasellus sed interdum lacus. Nulla facilisi. Suspendisse potenti. Fusce id eros enim.</p>
</div>

<footer>
  <p>&copy; Karanga 2024 Uma aula demo</p>
</footer>

<!-- Bootstrap JS e dependências opcionais -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.min.js"></script>

</body>
</html>
<?php mysqli_close($conexao); ?>
