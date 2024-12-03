<?php
include 'verifica_sessao.php'; // Verifica se o usuário está logado
include 'conexao.php'; // Inclui a conexão com o banco de dados
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Moto</title>
    <link rel="stylesheet" href="css/layout.css">
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
            <h1>Cadastro de Moto</h1>
            <form action="processa_cadastra_moto.php" method="post">
                <p>
                    <label for="marca">Marca:</label>
                    <input type="text" name="marca" id="marca" required>
                </p>
                <p>
                    <label for="modelo">Modelo:</label>
                    <input type="text" name="modelo" id="modelo" required>
                </p>
                <p>
                    <label for="ano">Ano de Fabricação:</label>
                    <input type="text" name="ano_fabricacao" id="ano" required>
                </p>
                <p>
                    <label for="cor">Cor:</label>
                    <input type="text" name="cor" id="cor" required>
                </p>
                <p>
                    <label for="chassi">Número do Chassi:</label>
                    <input type="text" name="numero_chassi" id="chassi" required>
                </p>
                <p>
                    <label for="preco_venda">Preço de Venda:</label>
                    <input type="text" name="preco_venda" id="preco_venda" required>
                </p>
                <p>
                    <button type="submit">Cadastrar Moto</button>
                </p>
            </form>
        </div>

        <!-- Rodapé -->
        <div id="rodape">
            <p>Loja de Motos - Endereço: Rua das Motos, 123 - E-mail: suporte@lojademos.com - Fone: (61) 9966-6677</p>
        </div>
    </div>
</body>
</html>
