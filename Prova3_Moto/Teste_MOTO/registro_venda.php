<?php
include 'verifica_sessao.php'; // Inclui a verificação da sessão
include 'conexao.php'; // Inclui a conexão com o banco de dados

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
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Venda</title>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
</head>
<body>
<div id="principal">
        <!-- Topo -->
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


       
        <!-- Conteúdo Específico -->
        <div id="conteudo_especifico">
            <h1>Registro de Venda</h1>
            <form action="processa_registro_venda.php" method="post">
                <table>
                    <tr>
                        <td><label for="cliente">Cliente:</label></td>
                        <td>
                            <select name="cliente" id="cliente" required>
                                <option value="">Selecione um cliente</option>
                                <?php
                                while ($cliente = mysqli_fetch_assoc($result_clientes)) {
                                    echo "<option value='{$cliente['Cod_cliente']}'>{$cliente['Nome']}</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="moto">Moto:</label></td>
                        <td>
                            <select name="moto" id="moto" required>
                                <option value="">Selecione uma moto</option>
                                <?php
                                while ($moto = mysqli_fetch_assoc($result_motos)) {
                                    echo "<option value='{$moto['Cod_moto']}'>{$moto['Modelo']}</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="valor_total">Valor Total:</label></td>
                        <td><input type="number" name="valor_total" id="valor_total" required></td>
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
            <div id="texto_institucional">
                <h6>Loja de Motos - Endereço: Rua das Motos, 123 - E-mail: suporte@lojademotos.com - Fone: (61) 9966-6677</h6>
            </div>
        </div>
    </div>
</body>
</html>
