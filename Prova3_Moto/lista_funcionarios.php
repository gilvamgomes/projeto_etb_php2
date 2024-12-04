<?php
include 'verifica_sessao.php';
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Funcionários</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <div id="principal">
        <!-- Cabeçalho -->
        <div id="topo">
            <div id="logo">
                <h1>MULTI MOTOS</h1>
            </div>
            <div id="menu_global">
                <p>Olá, <?php echo isset($_SESSION['nome_usuario']) && !empty($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : 'Usuário'; ?></p>
                <?php include 'menu_local.php'; ?>
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div id="conteudo_especifico">
            <h1>Relatórios de Funcionários</h1>

            <!-- Funcionários Ativados -->
            <h2>Funcionários Ativos:</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Função</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta para buscar funcionários ativos ou sem status definido
                    $sqlAtivos = "SELECT * FROM funcionarios WHERE Status = 'ATIVADO' OR Status IS NULL";
                    $resultadoAtivos = mysqli_query($conectar, $sqlAtivos);

                    if (mysqli_num_rows($resultadoAtivos) > 0) {
                        while ($funcionario = mysqli_fetch_assoc($resultadoAtivos)) {
                            $status = $funcionario['Status'] ?? 'ATIVADO';

                            echo "<tr>";
                            echo "<td>{$funcionario['Cod_Fun']}</td>";
                            echo "<td>{$funcionario['Nome']}</td>";
                            echo "<td>{$funcionario['Cpf']}</td>";
                            echo "<td>{$funcionario['Funcao']}</td>";
                            echo "<td>{$status}</td>";
                            echo "<td>
                                    <a href='edita_funcionario.php?cod={$funcionario['Cod_Fun']}'>Editar</a> |
                                    <a href='altera_status_funcionario.php?cod={$funcionario['Cod_Fun']}&status=Inativo'>Inativar</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Nenhum funcionário ativo encontrado. Cadastre um novo funcionário.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Funcionários Inativos -->
            <h2>Funcionários Inativos:</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Função</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta para buscar funcionários inativos
                    $sqlInativos = "SELECT * FROM funcionarios WHERE Status = 'Inativo'";
                    $resultadoInativos = mysqli_query($conectar, $sqlInativos);

                    if (mysqli_num_rows($resultadoInativos) > 0) {
                        while ($funcionario = mysqli_fetch_assoc($resultadoInativos)) {
                            echo "<tr>";
                            echo "<td>{$funcionario['Cod_Fun']}</td>";
                            echo "<td>{$funcionario['Nome']}</td>";
                            echo "<td>{$funcionario['Cpf']}</td>";
                            echo "<td>{$funcionario['Funcao']}</td>";
                            echo "<td>{$funcionario['Status']}</td>";
                            echo "<td>
                                    <a href='edita_funcionario.php?cod={$funcionario['Cod_Fun']}'>Editar</a> |
                                    <a href='altera_status_funcionario.php?cod={$funcionario['Cod_Fun']}&status=ATIVADO'>Ativar</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Nenhum funcionário inativo encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Rodapé -->
        <div id="rodape">
            <p>MULTI MOTOS - Endereço: Rua das Motos, 123 - E-mail: suporte@multimotos.com - Fone: (61) 9966-6677</p>
        </div>
    </div>
</body>
</html>
