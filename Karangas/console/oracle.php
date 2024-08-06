<?php
$agora = date('Y-m-d H:i:s');

$host  = "localhost";
$user  = "root";
$pass  = "123456789";
$banco = "karangas";
$porta = 3306;

// Criando a conexão MySQLi
$conexao = mysqli_connect($host, $user, $pass, $banco, $porta);
mysqli_set_charset($conexao, "utf8");

// Verificando se ocorreu algum erro na conexão
if (!$conexao) 
 {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error()); 
 }

mysqli_set_charset($conexao, "utf8");

// Função para recuperar todas as marcas cadastradas
function getMarcas() {
   global $conexao;
   
   $sql = "SELECT idmarca, marca FROM marca";
   $result = $conexao->query($sql);
   
   $marcas = array();
   while ($row = $result->fetch_assoc()) {
       $marcas[$row['idmarca']] = $row['marca'];
   }
   
   return $marcas;
}

// Função para recuperar todos os tipos de veículos e seus exemplos de modelo cadastrados
function getTiposVeiculos() {
   global $conexao;
   
   $sql = "SELECT idtipo, tipovec, exemplo_modelo FROM tipoveiculo";
   $result = $conexao->query($sql);
   
   $tiposVeiculos = array();
   while ($row = $result->fetch_assoc()) {
       $tiposVeiculos[$row['idtipo']] = array(
           'tipovec' => $row['tipovec'],
       );
   }
   
   return $tiposVeiculos;
}

// Função para obter os clientes
function getClientes() {
    global $conexao;
    $sql = "SELECT idcli, nome FROM clientes";
    $result = $conexao->query($sql);

    $clientes = array();
    while ($row = $result->fetch_assoc()) {
        $clientes[$row['idcli']] = $row['nome'];
    }
    return $clientes;
}

// Fechando a conexão ao final do script (opcional)
//mysqli_close($conexao
?>