<?php
include 'verifica_sessao.php'; // Verifica se o usuário está logado
include 'conexao.php'; // Inclui a conexão com o banco de dados
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Estoque - Loja de Motos</title>
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <div id="principal">
        <div id="topo">
            <div id="logo">
                <h1>Loja de Motos</h1>
            </div>
            <div id="menu_global">
                <!-- Saudação ao usuário -->
                <p>Olá, <?php echo isset($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : 'Usuário'; ?></p>
                <!-- Inclusão do menu -->
                <?php include 'menu_local.php'; ?>
            </div>
        </div>
        <div id="conteudo_especifico">
            <h1>Relatório de Estoque</h1>
            <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; text-align: center;">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Ano de Fabricação</th>
                        <th>Cor</th>
                        <th>Preço de Venda</th>
                        <th>Quantidade em Estoque</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta no banco de dados para obter as motos
                    $query = "SELECT Cod_moto, Modelo, Marca, Ano_de_fabricacao, Cor, Preco_de_venda, Quantidade_em_estoque FROM moto";
                    $result = mysqli_query($conectar, $query);

                    // Exibição dos dados no relatório
                    if (mysqli_num_rows($result) > 0) {
                        while ($moto = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $moto['Cod_moto'] . "</td>";
                            echo "<td>" . $moto['Modelo'] . "</td>";
                            echo "<td>" . $moto['Marca'] . "</td>";
                            echo "<td>" . $moto['Ano_de_fabricacao'] . "</td>";
                            echo "<td>" . $moto['Cor'] . "</td>";
                            echo "<td>R$ " . number_format($moto['Preco_de_venda'], 2, ',', '.') . "</td>";
                            echo "<td>" . $moto['Quantidade_em_estoque'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Nenhuma moto cadastrada no estoque.</td></tr>";
                    }

                    // Fechando a conexão com o banco
                    mysqli_close($conectar);
                    ?>
                </tbody>
            </table>
        </div>
        <div id="rodape">
            <p>Loja de Motos - Endereço: Rua das Motos, 123 - E-mail: suporte@lojademos.com - Fone: (61) 9966-6677</p>
        </div>
    </div>
</body>
</html>
