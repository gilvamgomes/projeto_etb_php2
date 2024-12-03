<?php
include 'verifica_sessao.php';
include 'conexao.php'; // Inclui a conexão com o banco de dados
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Motos</title>
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <!-- Cabeçalho -->
    <div id="principal">
        <div id="topo">
            <div id="logo">
                <h1>Loja de Motos</h1>
            </div>
            <div id="menu_global">
                <!-- Saudação ao usuário -->
                <p>Olá, <?php echo isset($_SESSION['nome_usuario']) && !empty($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : 'Usuário'; ?></p>
                <!-- Inclusão do menu -->
                <?php include 'menu_local.php'; ?>
            </div>
        </div>
        <div id="conteudo_especifico">
            <h1>Motos Disponíveis</h1>
            <?php
            // Query para buscar as motos no banco de dados
            $sql = "SELECT Cod_moto, Modelo, Marca, Preco_de_venda FROM moto";
            $resultado = mysqli_query($conectar, $sql);

            if (mysqli_num_rows($resultado) > 0) {
                echo "<table border='1'>";
                echo "<tr><th>Código</th><th>Modelo</th><th>Marca</th><th>Preço de Venda</th></tr>";
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $linha['Cod_moto'] . "</td>";
                    echo "<td>" . $linha['Modelo'] . "</td>";
                    echo "<td>" . $linha['Marca'] . "</td>";
                    echo "<td>" . $linha['Preco_de_venda'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Não há motos cadastradas no momento.</p>";
            }
            ?>
        </div>
        <!-- Rodapé -->
        <div id="rodape">
            <p>Loja de Motos - Endereço: Rua das Motos, 123 - E-mail: suporte@lojademos.com - Fone: (61) 9966-6677</p>
        </div>
    </div>
</body>
</html>
