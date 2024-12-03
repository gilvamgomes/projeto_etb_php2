<?php
include 'verifica_sessao.php';
include 'conexao.php';

// Verifica se o usuário tem permissão de administrador ou vendedor
if ($_SESSION['funcao_usuario'] !== 'Administrador' && $_SESSION['funcao_usuario'] !== 'Vendedor') {
    echo "<script>alert('Acesso negado! Apenas administradores ou vendedores podem acessar esta página.');</script>";
    echo "<script>location.href='administracao.php';</script>";
    exit;
}

// Obter clientes para exibir no select
$sql_clientes = "SELECT Cod_cliente, Nome FROM cliente";
$result_clientes = mysqli_query($conectar, $sql_clientes);

// Obter motos disponíveis para exibir no select
$sql_motos = "SELECT Cod_moto, Modelo, Preco_de_venda FROM moto WHERE Status_de_disponibilidade = 'Disponível'";
$result_motos = mysqli_query($conectar, $sql_motos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Venda</title>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
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
            <h1>Registro de Venda</h1>
            <form action="processa_registro_venda.php" method="post">
                <table>
                    <tr>
                        <td><label for="cliente">Cliente:</label></td>
                        <td>
                            <select name="cliente" id="cliente" required>
                                <option value="">Selecione um cliente</option>
                                <?php while ($cliente = mysqli_fetch_assoc($result_clientes)): ?>
                                    <option value="<?php echo $cliente['Cod_cliente']; ?>"><?php echo $cliente['Nome']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="moto">Moto:</label></td>
                        <td>
                            <select name="moto" id="moto" required>
                                <option value="">Selecione uma moto</option>
                                <?php while ($moto = mysqli_fetch_assoc($result_motos)): ?>
                                    <option value="<?php echo $moto['Cod_moto']; ?>"><?php echo $moto['Modelo'] . " - R$ " . $moto['Preco_de_venda']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="responsavel_venda">Responsável pela Venda:</label></td>
                        <td><input type="text" name="responsavel_venda" id="responsavel_venda" value="<?php echo $_SESSION['nome_usuario']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="valor_total">Valor Total:</label></td>
                        <td><input type="number" name="valor_total" id="valor_total" required readonly></td>
                    </tr>
                    <tr>
                        <td><label for="valor_entrada">Valor de Entrada:</label></td>
                        <td><input type="number" name="valor_entrada" id="valor_entrada"></td>
                    </tr>
                    <tr>
                        <td><label for="forma_pagamento">Forma de Pagamento:</label></td>
                        <td>
                            <select name="forma_pagamento" id="forma_pagamento" required>
                                <option value="À Vista">À Vista</option>
                                <option value="Parcelado">Parcelado</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="num_parcelas">Número de Parcelas:</label></td>
                        <td><input type="number" name="num_parcelas" id="num_parcelas" min="1"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <button type="submit">Registrar Venda</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- Rodapé -->
        <div id="rodape">
            <p>Loja de Motos - Endereço: Rua das Motos, 123 - E-mail: suporte@lojademos.com - Fone: (61) 9966-6677</p>
        </div>
    </div>

    <!-- Script para atualizar valor total ao selecionar moto -->
    <script>
        document.getElementById('moto').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const motoPreco = selectedOption.text.split(" - R$ ")[1];
            document.getElementById('valor_total').value = motoPreco || '';
        });
    </script>
</body>
</html>
