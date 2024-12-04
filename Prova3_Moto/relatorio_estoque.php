<?php
include 'verifica_sessao.php'; // Verifica a sessão do usuário
include 'conexao.php'; // Conexão com o banco de dados

// Consulta para buscar motos com saldo positivo
$sql = "SELECT * FROM moto WHERE Quantidade_em_estoque >= 1";
$result = mysqli_query($conectar, $sql);

if (!$result) {
    die("Erro na consulta ao banco de dados: " . mysqli_error($conectar));
}
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
        <!-- Topo -->
        <div id="topo">
            <div id="logo">
                <h1>MULTI MOTOS</h1>
            </div>
            <div id="menu_global">
                <p>Olá, <?php echo isset($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : 'Usuário'; ?></p>
                <?php include 'menu_local.php'; ?>
            </div>
        </div>

        <!-- Conteúdo Específico -->
        <div id="conteudo_especifico">
            <h1>Relatório de itens disponiveis em Estoque</h1>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <table border="1" cellpadding="5" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Ano</th>
                            <th>Cor</th>
                            <th>Número do Chassi</th>
                            <th>Preço de Venda</th>
                            <th>Quantidade em Estoque</th>
                            <th>Status</th>
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
                                <td><?php echo $moto['Numero_do_chassi']; ?></td>
                                <td>R$ <?php echo number_format($moto['Preco_de_venda'], 2, ',', '.'); ?></td>
                                <td><?php echo $moto['Quantidade_em_estoque']; ?></td>
                                <td><?php echo $moto['Status_de_disponibilidade']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhuma moto disponível com saldo positivo no estoque.</p>
            <?php endif; ?>
        </div>

        <!-- Rodapé -->
        <div id="rodape">
            <p>MULTI MOTOS - Endereço: Rua das Motos, 123 - E-mail: suporte@multimotos.com - Fone: (61) 9966-6677</p>
        </div>
    </div>
</body>
</html>

<?php
// Fechar a conexão com o banco
mysqli_close($conectar);
?>
