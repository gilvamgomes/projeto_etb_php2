<?php
include 'verifica_sessao.php';
include 'conexao.php';

if (isset($_GET['cod'])) {
    $cod = $_GET['cod'];
    $sql = "SELECT * FROM funcionarios WHERE Cod_Fun = $cod";
    $result = mysqli_query($conectar, $sql);
    $funcionario = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Funcionário não encontrado!');</script>";
    echo "<script>location.href='lista_funcionarios.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <div id="principal">
        <h1>Editar Funcionário</h1>
        <form method="POST" action="processa_edita_funcionario.php">
            <input type="hidden" name="cod" value="<?php echo $funcionario['Cod_Fun']; ?>">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $funcionario['Nome']; ?>" required>
            <label>Função:</label>
            <input type="text" name="funcao" value="<?php echo $funcionario['Funcao']; ?>" required>
            <label>Status:</label>
            <select name="status">
                <option value="ATIVADO" <?php echo $funcionario['Status'] === 'ATIVADO' ? 'selected' : ''; ?>>Ativado</option>
                <option value="Inativo" <?php echo $funcionario['Status'] === 'Inativo' ? 'selected' : ''; ?>>Inativo</option>
            </select>
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
