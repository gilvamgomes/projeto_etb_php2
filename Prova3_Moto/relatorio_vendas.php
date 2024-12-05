<?php
include 'verifica_sessao.php';
include 'conexao.php';

// Consulta para buscar os produtos vendidos
$sql_consulta_vendas = "
    SELECT v.Cod_Venda, v.Data, v.Hora, v.Responsavel_pela_venda, v.Valor_total, v.Forma_de_pagamento, 
           m.Modelo AS Moto, c.Nome AS Cliente
    FROM venda v
    INNER JOIN moto m ON v.Cod_moto = m.Cod_moto
    INNER JOIN cliente c ON v.Cod_cliente = c.Cod_cliente
";
$result = mysqli_query($conectar, $sql_consulta_vendas);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    die("Erro ao executar a consulta: " . mysqli_error($conectar));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Produtos Vendidos</title>
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
<div id="principal">
    <div id="topo">
        <div id="logo">
            <h1>MULTI MOTOS</h1>
        </div>
        <div id="menu_global">
            <p>Olá, <?php echo $_SESSION['nome_usuario']; ?></p>
            <?php include 'menu_local.php'; ?>
        </div>
    </div>

    <div id="conteudo_especifico">
        <h1>Relatório de Produtos Vendidos</h1>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Código da Venda</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Responsável</th>
                        <th>Cliente</th>
                        <th>Moto</th>
                        <th>Valor Total</th>
                        <th>Forma de Pagamento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($venda = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $venda['Cod_Venda']; ?></td>
                            <td><?php echo $venda['Data']; ?></td>
                            <td><?php echo $venda['Hora']; ?></td>
                            <td><?php echo $venda['Responsavel_pela_venda']; ?></td>
                            <td><?php echo $venda['Cliente']; ?></td>
                            <td><?php echo $venda['Moto']; ?></td>
                            <td><?php echo "R$ " . number_format($venda['Valor_total'], 2, ',', '.'); ?></td>
                            <td><?php echo $venda['Forma_de_pagamento']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhuma venda registrada até o momento.</p>
        <?php endif; ?>
    </div>

    <div id="rodape">
        <p>MULTI MOTOS - Endereço: Rua das Motos, 123 - E-mail: suporte@multimotos.com - Fone: (61) 9966-6677</p>
    </div>
</div>
</body>
</html>
