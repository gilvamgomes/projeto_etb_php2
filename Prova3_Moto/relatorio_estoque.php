<?php
include 'verifica_sessao.php';
include 'conexao.php';

$query = "SELECT Cod_moto, Marca, Modelo, Quantidade_em_estoque, Preco_de_custo, Preco_de_venda FROM moto";
$result = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Estoque</title>
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <div id="principal">
        <div id="topo">
            <div id="logo">
                <h1>Loja de Motos</h1>
            </div>
            <div id="menu_global">
                <p>Olá, <?php echo $_SESSION['nome_usuario']; ?></p>
                <?php include 'menu_local.php'; ?>
            </div>
        </div>
        <div id="conteudo_especifico">
            <h1>Relatório de Estoque</h1>
            <table border="1">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Quantidade</th>
                        <th>Preço de Custo</th>
                        <th>Preço de Venda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($moto = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $moto['Cod_moto']; ?></td>
                            <td><?php echo $moto['Marca']; ?></td>
                            <td><?php echo $moto['Modelo']; ?></td>
                            <td><?php echo $moto['Quantidade_em_estoque']; ?></td>
                            <td><?php echo $moto['Preco_de_custo']; ?></td>
                            <td><?php echo $moto['Preco_de_venda']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div id="rodape">
            <p>Loja de Motos - Endereço: Rua das Motos, 123 - E-mail: suporte@lojademos.com - Fone: (61) 9966-6677</p>
        </div>
    </div>
</body>
</html>
