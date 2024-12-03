<?php
include 'verifica_sessao.php';
include 'conexao.php';

$query = "SELECT Cod_moto, Marca, Modelo, Ano_de_fabricacao, Cor, Cilindrada, Tipo, Preco_de_custo, Preco_de_venda, Quantidade_em_estoque, Tipo_de_combustivel, Potencia, Sistema_de_freios, Abs, Peso, Capacidade_do_tanque, Tipo_de_partida, Status_de_disponibilidade FROM moto";
$result = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Motos</title>
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
            <h1>Motos Disponíveis</h1>
            <table border="1">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Preço de Venda</th>
                        <th>Quantidade</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
    <?php while ($moto = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $moto['Cod_moto']; ?></td>
            <td><?php echo $moto['Marca']; ?></td>
            <td><?php echo $moto['Modelo']; ?></td>
            <td><?php echo "R$ " . $moto['Preco_de_venda']; ?></td>
            <td><?php echo $moto['Quantidade_em_estoque']; ?></td>
            <td><?php echo $moto['Status_de_disponibilidade']; ?></td>
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
