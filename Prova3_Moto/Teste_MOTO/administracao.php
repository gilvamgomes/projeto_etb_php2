<?php
include 'verifica_sessao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Loja de Motos</title>
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/menu.css">
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

        <!-- Conteúdo principal -->
        <div id="conteudo_especifico">
            <h1>ADMINISTRAÇÃO</h1>
            <p>Seja bem-vindo ao sistema de controle de estoque e venda de motos da Loja de Motos.</p>
        </div>

        <!-- Rodapé -->
        <div id="rodape">
            <p>Loja de Motos - Endereço: Rua das Motos, 123 - E-mail: suporte@lojademos.com - Fone: (61) 9966-6677</p>
        </div>
    </div>
</body>
</html>

