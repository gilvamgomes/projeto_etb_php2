<?php
include 'db_config.php';

$Cod_cliente = $_GET['Cod_cliente']; // Recebe o ID do cliente
$sql_cliente = "SELECT Nome FROM cliente WHERE Cod_cliente = '$Cod_cliente'";
$cliente = mysqli_fetch_assoc(mysqli_query($conectar, $sql_cliente))['Nome'];

echo "<h1>Histórico de Compras de $cliente</h1>";
$sql = "SELECT * FROM venda WHERE Cod_cliente = '$Cod_cliente'";
$resultado = mysqli_query($conectar, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<table border='1'>
            <tr>
                <th>Data</th>
                <th>Moto</th>
                <th>Valor Total</th>
            </tr>";
    while ($venda = mysqli_fetch_assoc($resultado)) {
        $Cod_moto = $venda['Cod_moto'];
        $moto = mysqli_fetch_assoc(mysqli_query($conectar, "SELECT Modelo FROM moto WHERE Cod_moto = '$Cod_moto'"))['Modelo'];

        echo "<tr>
                <td>{$venda['Data']}</td>
                <td>{$moto}</td>
                <td>R$ {$venda['Valor_total']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhuma compra registrada para este cliente.";
}

mysqli_close($conectar);

/*Exibe o histórico de compras de um cliente específico*/
?>
