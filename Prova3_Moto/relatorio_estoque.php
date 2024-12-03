<?php
include 'verifica_sessao.php'; // Verifica se o usuário está logado
include 'conexao.php'; // Inclui a conexão com o banco de dados

// Consulta para obter todas as motos
$sql = "SELECT * FROM moto";
$result = mysqli_query($conectar, $sql);

// Verifica se houve erro na consulta
if (!$result) {
    die("Erro ao buscar os dados: " . mysqli_error($conectar));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Estoque</title>
    <link rel="stylesheet" href="css/layout.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
            text-align: left;
        }
        th, td {
            padding: 6px 8px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .compact-table td {
            padding: 4px 6px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="principal">
        <!-- Cabeçalho -->
        <div id="topo">
            <div id="logo">
                <h1>Loja de Motos</h1>
            </div>
            <div id="menu_global">
                <p>Olá, <?php echo isset($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : 'Usuário'; ?></p>
                <?php include 'menu_local.php'; ?>
            </div>
        </div>

        <!-- Conteúdo -->
        <div id="conteudo_especifico">
            <h1>Relatório de Estoque</h1>
            <table class="compact-table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>Cor</th>
                        <th>Chassi</th>
                        <th>Cilindrada</th>
                        <th>Tipo</th>
                        <th>Custo</th>
                        <th>Venda</th>
                        <th>Estoque</th>
                        <th>Combustível</th>
                        <th>Potência</th>
                        <th>Freios</th>
                        <th>ABS</th>
                        <th>Peso</th>
                        <th>Tanque</th>
                        <th>Partida</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($moto = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $moto['Cod_moto']; ?></td>
                            <td><?php echo $moto['Marca']; ?></td>
                            <td><?php echo $moto['Modelo']; ?></td>
                            <td><?php echo $moto['Ano_de_fabricacao']; ?></td>
                            <td><?php echo $moto['Cor']; ?></td>
                            <td><?php echo $moto['Numero_do_chassi']; ?></td>
                            <td><?php echo $moto['Cilindrada']; ?> cc</td>
                            <td><?php echo $moto['Tipo']; ?></td>
                            <td>R$ <?php echo number_format($moto['Preco_de_custo'], 2, ',', '.'); ?></td>
                            <td>R$ <?php echo number_format($moto['Preco_de_venda'], 2, ',', '.'); ?></td>
                            <td><?php echo $moto['Quantidade_em_estoque']; ?></td>
                            <td><?php echo $moto['Tipo_de_combustivel']; ?></td>
                            <td><?php echo $moto['Potencia']; ?> HP</td>
                            <td><?php echo $moto['Sistema_de_freios']; ?></td>
                            <td><?php echo $moto['Abs'] === '1' ? 'Sim' : 'Não'; ?></td>
                            <td><?php echo $moto['Peso']; ?> kg</td>
                            <td><?php echo $moto['Capacidade_do_tanque']; ?> L</td>
                            <td><?php echo $moto['Tipo_de_partida']; ?></td>
                            <td><?php echo $moto['Status_de_disponibilidade']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Rodapé -->
        <div id="rodape">
            <p>Loja de Motos - Endereço: Rua das Motos, 123 - E-mail: suporte@lojademos.com - Fone: (61) 9966-6677</p>
        </div>
    </div>
</body>
</html>