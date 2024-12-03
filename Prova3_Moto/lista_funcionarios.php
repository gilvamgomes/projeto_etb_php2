<?php
include 'verifica_sessao.php';
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <div id="principal">
        <!-- Cabeçalho -->
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

        <!-- Conteúdo Principal -->
        <div id="conteudo_especifico">
            <h1>Funcionários</h1>
            <table border="1">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Função</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta para buscar os funcionários
                    $sql = "SELECT Cod_Fun, Nome, Funcao, Status FROM funcionarios";
                    $resultado = mysqli_query($conectar, $sql);

                    if (mysqli_num_rows($resultado) > 0) {
                        while ($funcionario = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td>{$funcionario['Cod_Fun']}</td>";
                            echo "<td>{$funcionario['Nome']}</td>";
                            echo "<td>{$funcionario['Funcao']}</td>";
                            echo "<td>{$funcionario['Status']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Nenhum funcionário encontrado.</td></tr>";
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
