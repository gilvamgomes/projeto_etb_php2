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
    <style>
        /* Estilos gerais para o formulário */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #000;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            color: #fff;
            font-size: 14px;
        }

        .form-container input, 
        .form-container select, 
        .form-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container button {
            background-color: red;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <div id="principal">
        <!-- Cabeçalho -->
        <div id="topo">
            <div id="logo">
                <h1>MULTI MOTOS</h1>
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
                    <label for="marca">Marca:</label>
                    <input type="text" name="marca" id="marca" required>

                    <label for="modelo">Modelo:</label>
                    <input type="text" name="modelo" id="modelo" required>

                    <label for="ano_fabricacao">Ano de Fabricação:</label>
                    <input type="text" name="ano_fabricacao" id="ano_fabricacao" required>

                    <label for="cor">Cor:</label>
                    <input type="text" name="cor" id="cor" required>

                    <label for="numero_chassi">Número do Chassi:</label>
                    <input type="text" name="numero_chassi" id="numero_chassi" required>

                    <label for="cilindrada">Cilindrada:</label>
                    <input type="text" name="cilindrada" id="cilindrada">

                    <label for="tipo">Tipo:</label>
                    <input type="text" name="tipo" id="tipo">

                    <label for="preco_custo">Preço de Custo R$:</label>
                    <input type="text" name="preco_custo" id="preco_custo">

                    <label for="preco_venda">Preço de Venda R$:</label>
                    <input type="text" name="preco_venda" id="preco_venda" required>

                    <label for="quantidade_em_estoque">Quantidade em Estoque:</label>
                    <input type="number" name="quantidade_em_estoque" id="quantidade_em_estoque">

                    <label for="tipo_de_combustivel">Tipo de Combustível:</label>
                    <input type="text" name="tipo_de_combustivel" id="tipo_de_combustivel">

                    <label for="potencia">Potência:</label>
                    <input type="text" name="potencia" id="potencia">

                    <label for="sistema_de_freios">Sistema de Freios:</label>
                    <input type="text" name="sistema_de_freios" id="sistema_de_freios">

                    <label for="abs">ABS:</label>
                    <input type="text" name="abs" id="abs">

                    <label for="peso">Peso:</label>
                    <input type="text" name="peso" id="peso">

                    <label for="capacidade_do_tanque">Capacidade do Tanque:</label>
                    <input type="text" name="capacidade_do_tanque" id="capacidade_do_tanque">

                    <label for="tipo_de_partida">Tipo de Partida:</label>
                    <input type="text" name="tipo_de_partida" id="tipo_de_partida">

                    <label for="status_de_disponibilidade">Status de Disponibilidade:</label>
                    <select name="status_de_disponibilidade" id="status_de_disponibilidade" required>
                        <option value="Disponível">Disponível</option>
                        <option value="Indisponível">Indisponível</option>
                    </select>

                    <button type="submit">Cadastrar Moto</button>
                </form>
            
        </div>

        <!-- Rodapé -->
        <div id="rodape">
            <p>MULTI MOTOS - Endereço: Rua das Motos, 123 - E-mail: suporte@multimotos.com - Fone: (61) 9966-6677</p>
        </div>
    </div>
</body>
</html>
