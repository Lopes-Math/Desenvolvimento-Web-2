<?php
    include "console/oracle.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karanga! A sua loja de carros.</title>
    <link rel="stylesheet" href="console/css/customizado.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            color: white;
            background-color: #E19757;
        }
        footer {
            text-align: center;
            margin: 20px 0;
        }
        h2 {
            font-size: 1.5em;
            text-align: center;
            font-weight: bold;
            unicode-bidi: isolate;
            color: #0A202D;
        }
    </style>
</head>
<body>
    <div class="topnav-logo">
        <a href="console\index2.php" class="logo">
        <img class="logo-karanga" src="imagens\logo_karanga.png" alt="Logo Karanga">
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
        <a href="console\index2.php">Home</a>
        <a href="console\cadastros.php">Cadastros</a>
        <a href="index.php" class="active">Anúncios</a>  
        <div class="botao-sair-direita">
            <a href="sair.php" class="botao-sair">Sair</a> <!-- Botão Sair -->
        </div>
        </nav>
    </div>
    <main>
        <div class="conteudo">
            <h2>Veículos Cadastrados</h2>
            <section id="veiculos" class="tabela">
                <table>
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Ano</th>
                            <th>Quilometragem</th>
                            <th>Valor de Saída</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                         $query = "SELECT marca.marca, veiculos.modelo, veiculos.ano_mod, veiculos.quilometragem, veiculos.valorout FROM veiculos JOIN marca ON veiculos.idmarca = marca.idmarca";
                        $result = $conexao->query($query);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $valorout_formatado = number_format($row["valorout"], 2, ',', '.'); // Formatação do valor

                                 // Converte a quilometragem para um número
                                $quilometragem_numero = (float) str_replace(',', '.', $row["quilometragem"]);
                                // Formatação da quilometragem
                                $quilometragem_formatada = number_format($quilometragem_numero, 0, ',', '.');

                                echo "<tr>";
                                echo "<td>" . $row["marca"] . "</td>";
                                echo "<td>" . $row["modelo"] . "</td>";
                                echo "<td>" . $row["ano_mod"] . "</td>";
                                echo "<td>" . $row["quilometragem"] . "</td>";
                                echo "<td>R$ " . $valorout_formatado . "</td>"; // Exibindo o valor formatado
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Nenhum veículo encontrado</td></tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </section>
        </main>           
    </div>
    <footer>
        <p>&copy; Karanga 2024 Uma aula demo</p>
    </footer>
</body>
</html>
<?php
    $conexao->close();
?>