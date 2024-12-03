<?php
include 'db_config.php';

$Cod_Fun = $_GET['Cod_Fun'];
$sql = "SELECT * FROM funcionarios WHERE Cod_Fun = '$Cod_Fun'";
$resultado = mysqli_query($conectar, $sql);
$funcionario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
</head>
<body>
    <h1>Editar Funcionário</h1>
    <form action="processa_edita_funcionario.php" method="POST">
        <input type="hidden" name="Cod_Fun" value="<?php echo $funcionario['Cod_Fun']; ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $funcionario['Nome']; ?>" required><br>

        <label>CPF:</label>
        <input type="text" name="cpf" value="<?php echo $funcionario['Cpf']; ?>" required><br>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $funcionario['Telefone']; ?>" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $funcionario['Email']; ?>" required><br>

        <label>Função:</label>
        <select name="funcao">
            <option value="Administrador" <?php echo $funcionario['Funcao'] == 'Administrador' ? 'selected' : ''; ?>>Administrador</option>
            <option value="Vendedor" <?php echo $funcionario['Funcao'] == 'Vendedor' ? 'selected' : ''; ?>>Vendedor</option>
        </select><br>

        <label>Status:</label>
        <select name="status">
            <option value="ATIVADO" <?php echo $funcionario['Status'] == 'ATIVADO' ? 'selected' : ''; ?>>Ativado</option>
            <option value="DESATIVADO" <?php echo $funcionario['Status'] == 'DESATIVADO' ? 'selected' : ''; ?>>Desativado</option>
        </select><br>

        <button type="submit">Salvar Alterações</button>
    </form>
</body>

<!--Formulário para editar informações de um funcionário --> 
</html>
