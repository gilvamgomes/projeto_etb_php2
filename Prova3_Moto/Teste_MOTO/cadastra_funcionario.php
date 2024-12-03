<?php

include 'verifica_sessao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <div id="principal">
        <div id="topo">
            <div id="logo">
                <h1>Loja de Motos</h1>
            </div>
            <div id="menu_global">
                <p>Olá, <?php echo isset($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : 'Usuário'; ?></p>
                <?php include 'menu_local.php'; ?>
            </div>
        </div>
        <div id="conteudo_especifico">
            <h1>Cadastro de Funcionário</h1>
            <form method="POST" action="processa_cadastra_funcionario.php">
    <label>Nome:</label>
    <input type="text" name="nome" required>

    <label>CPF:</label>
    <input type="text" name="cpf" required>

    <label>RG:</label>
    <input type="text" name="rg" required>

    <label>Data de Nascimento:</label>
    <input type="date" name="nascimento" required>

    <label>Endereço:</label>
    <input type="text" name="endereco" required>

    <label>Telefone:</label>
    <input type="text" name="telefone" required>

    <label>E-mail:</label>
    <input type="email" name="email" required>

    <label>Login:</label>
    <input type="text" name="login" required>

    <label>Senha:</label>
    <input type="password" name="senha" required>

    <label>Função:</label>
    <input type="text" name="funcao" required>

    <button type="submit">Cadastrar</button>
</form>

        </div>
        <div id="rodape">
            <p>Loja de Motos - Endereço: Rua das Motos, 123 - E-mail: suporte@lojademos.com - Fone: (61) 9966-6677</p>
        </div>
    </div>
</body>
</html>
