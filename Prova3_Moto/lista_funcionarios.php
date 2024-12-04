<?php
include 'verifica_sessao.php';
include 'conexao.php';

// Consulta para buscar funcionários ativos
$sql_ativos = "SELECT Cod_Fun, Nome, Funcao, Status FROM funcionarios WHERE Status = 'Ativo'";
$resultado_ativos = mysqli_query($conectar, $sql_ativos);

// Consulta para buscar funcionários inativos
$sql_inativos = "SELECT Cod_Fun, Nome, Funcao, Status FROM funcionarios WHERE Status = 'Inativo'";
$resultado_inativos = mysqli_query($conectar, $sql_inativos);

if (!$resultado_ativos || !$resultado_inativos) {
    die("Erro na consulta ao banco de dados: " . mysqli_error($conectar));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/layout.css">
    <style>
        .tabela-centro {
            margin: auto;
            width: 80%;
            border-collapse: collapse;
            text-align: left;
        }

        .tabela-centro th, .tabela-centro td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .tabela-centro th {
            background-color: #f4f4f4;
            text-align: center;
        }

        .tabela-centro tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .tabela-centro tr:hover {
            background-color: #f1f1f1;
        }

        .mensagem {
            text-align: center;
            color: #555;
            font-style: italic;
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
                <!-- Saudação ao usuário -->
                <p>Olá, <?php echo isset($_SESSION['nome_usuario']) && !empty($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : 'Usuário'; ?></p>
                <!-- Inclusão do menu -->
                <?php include 'menu_local.php'; ?>
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div id="conteudo_especifico">
            <h1>Relatórios dos Funcionários</h1>

            <!-- Funcionários Ativos -->
            <h2>Funcionários Ativos:</h2>
            <?php if (mysqli_num_rows($resultado_ativos) > 0): ?>
                <table class="tabela-centro">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Função</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($funcionario = mysqli_fetch_assoc($resultado_ativos)): ?>
                            <tr>
                                <td><?php echo $funcionario['Cod_Fun']; ?></td>
                                <td><?php echo $funcionario['Nome']; ?></td>
                                <td><?php echo $funcionario['Funcao']; ?></td>
                                <td><?php echo $funcionario['Status']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="mensagem">Nenhum funcionário ativo cadastrado. Cadastre um funcionário ativo primeiro.</p>
            <?php endif; ?>

            <!-- Funcionários Inativos -->
            <h2>Funcionários Inativos:</h2>
            <?php if (mysqli_num_rows($resultado_inativos) > 0): ?>
                <table class="tabela-centro">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Função</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($funcionario = mysqli_fetch_assoc($resultado_inativos)): ?>
                            <tr>
                                <td><?php echo $funcionario['Cod_Fun']; ?></td>
                                <td><?php echo $funcionario['Nome']; ?></td>
                                <td><?php echo $funcionario['Funcao']; ?></td>
                                <td><?php echo $funcionario['Status']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="mensagem">Nenhum funcionário inativo cadastrado. Cadastre um funcionário inativo primeiro.</p>
            <?php endif; ?>
        </div>

        <!-- Rodapé -->
        <div id="rodape">
            <p>MULTI MOTOS - Endereço: Rua das Motos, 123 - E-mail: suporte@multimotos.com - Fone: (61) 9966-6677</p>
        </div>
    </div>
</body>
</html>
