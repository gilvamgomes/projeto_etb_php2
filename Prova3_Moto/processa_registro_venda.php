<?php
include 'db_config.php';

$Cod_cliente = $_POST['Cod_cliente'];
$Cod_moto = $_POST['Cod_moto'];
$valor_total = $_POST['valor_total'];
$data = date("Y-m-d");

// Inserir venda no banco
$sql = "INSERT INTO venda (Cod_cliente, Cod_moto, Valor_total, Data, Status_da_venda) 
        VALUES ('$Cod_cliente', '$Cod_moto', '$valor_total', '$data', 'Concluída')";

if (mysqli_query($conectar, $sql)) {
    // Atualizar status da moto
    mysqli_query($conectar, "UPDATE moto SET Status_de_disponibilidade = 'Vendida' WHERE Cod_moto = '$Cod_moto'");
    echo "Venda registrada com sucesso!";
} else {
    echo "Erro ao registrar venda: " . mysqli_error($conectar);
}

mysqli_close($conectar);

/* Script para registrar vendas*/

?>
