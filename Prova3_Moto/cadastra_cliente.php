<?php

include 'verifica_sessao.php'; // Verifica se o usuário está logado
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
</head>
<body>
    
<div id="principal">
        <!-- Topo -->
        <div id="topo">
            <div id="logo">
            <h1> MULTI MOTOS </h1>
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
            <h1>Cadastro de Cliente</h1>
            <form action="processa_cadastra_cliente.php" method="post">
                <table>
                    <tr>
                        <td><label for="nome">Nome:</label></td>
                        <td><input type="text" name="nome" id="nome" required></td>
                    </tr>
                    <tr>
                        <td><label for="cpf">CPF:</label></td>
                        <td><input type="text" name="cpf" id="cpf" required></td>
                    </tr>
                    <tr>
                        <td><label for="rg">RG:</label></td>
                        <td><input type="text" name="rg" id="rg" required></td>
                    </tr>
                    <tr>
                        <td><label for="cnh">CNH:</label></td>
                        <td><input type="text" name="cnh" id="cnh"></td>
                    </tr>
                    <tr>
                        <td><label for="data_nascimento">Data de Nascimento:</label></td>
                        <td><input type="date" name="data_nascimento" id="data_nascimento" required></td>
                    </tr>
                    <tr>
                        <td><label for="endereco">Endereço:</label></td>
                        <td><input type="text" name="endereco" id="endereco" required></td>
                    </tr>
                    <tr>
                        <td><label for="telefone">Telefone:</label></td>
                        <td><input type="text" name="telefone" id="telefone" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">E-mail:</label></td>
                        <td><input type="email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <button type="submit">Cadastrar Cliente</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- Rodapé -->
        <div id="rodape">
            <div id="texto_institucional">
                <h6>MULTI MOTOS - Endereço: Rua das Motos, 123 - E-mail: suporte@multimotos.com - Fone: (61) 9966-6677</h6>
            </div>
        </div>
    </div>
</body>
</html>
