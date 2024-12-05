<?php
include 'verifica_sessao.php';
include 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['cod_usuario'])) {
    echo "<script>alert('Você não está logado!');</script>";
    echo "<script>location.href='index.php';</script>";
    exit;
}

// Verifica se a função do usuário é "Administrador" ou "Vendedor"
if ($_SESSION['funcao_usuario'] !== 'Administrador' && $_SESSION['funcao_usuario'] !== 'Vendedor') {
    echo "<script>alert('Acesso negado! Somente administradores e vendedores podem acessar esta página.');</script>";
    echo "<script>location.href='administracao.php';</script>";
}

// Consulta para buscar os clientes
$sql_clientes = "SELECT Cod_cliente, Nome FROM cliente";
$result_clientes = mysqli_query($conectar, $sql_clientes);

// Consulta para buscar as motos
$sql_motos = "SELECT Cod_moto, Modelo FROM moto";
$result_motos = mysqli_query($conectar, $sql_motos);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Venda</title>
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
        <h1>Registro de Venda</h1>
        <form action="processa_registro_venda.php" method="post">
            <label for="cliente">Cliente:</label>
            <select name="cliente" id="cliente" required>
                <option value="">Selecione um cliente</option>
                <?php while ($cliente = mysqli_fetch_assoc($result_clientes)): ?>
                    <option value="<?php echo $cliente['Cod_cliente']; ?>"><?php echo $cliente['Nome']; ?></option>
                <?php endwhile; ?>
            </select>

            <label for="moto">Moto:</label>
            <select name="moto" id="moto" required>
                <option value="">Selecione uma moto</option>
                <?php while ($moto = mysqli_fetch_assoc($result_motos)): ?>
                    <option value="<?php echo $moto['Cod_moto']; ?>"><?php echo $moto['Modelo']; ?></option>
                <?php endwhile; ?>
            </select>

            <label for="valor_total">Valor Total:</label>
            <input type="number" name="valor_total" id="valor_total" required>

            <label for="valor_entrada">Valor de Entrada:</label>
            <input type="number" name="valor_entrada" id="valor_entrada">

            <label for="forma_pagamento">Forma de Pagamento:</label>
            <select name="forma_pagamento" id="forma_pagamento" required>
                <option value="À Vista">À Vista</option>
                <option value="Parcelado">Parcelado</option>
            </select>

            <label for="num_parcelas">Número de Parcelas:</label>
            <input type="number" name="num_parcelas" id="num_parcelas" min="1">

            <button type="submit">Registrar Venda</button>
        </form>
    </div>

    <div id="rodape">
        <p>MULTI MOTOS - Endereço: Rua das Motos, 123 - E-mail: suporte@multimotos.com - Fone: (61) 9966-6677</p>
    </div>
</div>
</body>
</html>
