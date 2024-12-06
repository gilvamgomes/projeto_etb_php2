<?php
include 'verifica_sessao.php';
include 'conexao.php';

if (isset($_GET['cod_moto'])) {
    $cod_moto = $_GET['cod_moto'];
    $sql = "SELECT * FROM moto WHERE Cod_moto = $cod_moto";
    $result = mysqli_query($conectar, $sql);
    $moto = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Moto não encontrada!');</script>";
    echo "<script>location.href='lista_motos.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Moto</title>
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <div id="principal">
        <h1>Editar Moto</h1>
        <form method="POST" action="processa_edita_moto.php">
            <input type="hidden" name="cod_moto" value="<?php echo $moto['Cod_moto']; ?>">
            
            <label>Marca:</label>
            <input type="text" name="marca" value="<?php echo $moto['Marca']; ?>" required>

            <label>Modelo:</label>
            <input type="text" name="modelo" value="<?php echo $moto['Modelo']; ?>" required>

            <label>Cor:</label>
            <input type="text" name="cor" value="<?php echo $moto['Cor']; ?>" required>

            <label>Ano de Fabricação:</label>
            <input type="number" name="ano" value="<?php echo $moto['Ano_de_fabricacao']; ?>" required>

            <label>Status:</label>
            <select name="status">
                <option value="Disponível" <?php echo $moto['Status_de_disponibilidade'] === 'Disponível' ? 'selected' : ''; ?>>Disponível</option>
                <option value="Reservada" <?php echo $moto['Status_de_disponibilidade'] === 'Reservada' ? 'selected' : ''; ?>>Reservada</option>
                <option value="Vendida" <?php echo $moto['Status_de_disponibilidade'] === 'Vendida' ? 'selected' : ''; ?>>Vendida</option>
            </select>

            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
