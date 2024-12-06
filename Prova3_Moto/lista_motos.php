<?php
include 'verifica_sessao.php';
include 'conexao.php';

$query = "SELECT * FROM moto";
$result = mysqli_query($conectar, $query);

if (!$result) {
    die("Erro na consulta ao banco de dados: " . mysqli_error($conectar));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Motos - MULTI MOTOS</title>
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <div id="principal">
        <div id="topo">
            <div id="logo">
                <h1>MULTI MOTOS</h1>
            </div>
            <div id="menu_global">
                <p>Olá, <?php echo isset($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : 'Usuário'; ?></p>
                <?php include 'menu_local.php'; ?>
            </div>
        </div>
        <div id="conteudo_especifico">
            <h1>Lista de Motos Cadastradas</h1>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <table border="1" cellpadding="5" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Ano</th>
                            <th>Cor</th>
                            <th>Cilindrada</th>
                            <th>Tipo</th>
                            <th>Preço de Custo</th>
                            <th>Preço de Venda</th>
                            <th>Quantidade</th>
                            <th>Combustível</th>
                            <th>Potência</th>
                            <th>Freios</th>
                            <th>ABS</th>
                            <th>Peso</th>
                            <th>Capacidade do Tanque</th>
                            <th>Partida</th>
                            <th>Status</th>
                            <th>Ações</th> <!-- Nova coluna para ações -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($moto = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $moto['Cod_moto']; ?></td>
                                <td><?php echo $moto['Marca']; ?></td>
                                <td><?php echo $moto['Modelo']; ?></td>
                                <td><?php echo $moto['Ano_de_fabricacao']; ?></td>
                                <td><?php echo $moto['Cor']; ?></td>
                                <td><?php echo $moto['Cilindrada']; ?></td>
                                <td><?php echo $moto['Tipo']; ?></td>
                                <td><?php echo "R$ " . number_format($moto['Preco_de_custo'], 2, ',', '.'); ?></td>
                                <td><?php echo "R$ " . number_format($moto['Preco_de_venda'], 2, ',', '.'); ?></td>
                                <td><?php echo $moto['Quantidade_em_estoque']; ?></td>
                                <td><?php echo $moto['Tipo_de_combustivel']; ?></td>
                                <td><?php echo $moto['Potencia']; ?></td>
                                <td><?php echo $moto['Sistema_de_freios']; ?></td>
                                <td><?php echo $moto['Abs'] ? 'Sim' : 'Não'; ?></td>
                                <td><?php echo $moto['Peso']; ?></td>
                                <td><?php echo $moto['Capacidade_do_tanque']; ?></td>
                                <td><?php echo $moto['Tipo_de_partida']; ?></td>
                                <td><?php echo $moto['Status_de_disponibilidade']; ?></td>
                                <td>
                                    <a href="edita_moto.php?cod_moto=<?php echo $moto['Cod_moto']; ?>">Editar</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhuma moto cadastrada no momento.</p>
            <?php endif; ?>
        </div>
        <div id="rodape">
            <p>MULTI MOTOS - Endereço: Rua das Motos, 123 - E-mail: suporte@multimotos.com - Fone: (61) 9966-6677</p>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($conectar);
?>
