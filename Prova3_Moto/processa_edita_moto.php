<?php
include 'verifica_sessao.php';
include 'conexao.php';

if (isset($_POST['cod_moto']) && isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['cor']) && isset($_POST['ano']) && isset($_POST['status'])) {
    $cod_moto = $_POST['cod_moto'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $cor = $_POST['cor'];
    $ano = $_POST['ano'];
    $status = $_POST['status'];

    $sql = "UPDATE moto SET Marca = '$marca', Modelo = '$modelo', Cor = '$cor', Ano_de_fabricacao = '$ano', Status_de_disponibilidade = '$status' WHERE Cod_moto = $cod_moto";

    if (mysqli_query($conectar, $sql)) {
        echo "<script>alert('Moto atualizada com sucesso!');</script>";
        echo "<script>location.href='lista_motos.php';</script>";
    } else {
        echo "Erro ao atualizar moto: " . mysqli_error($conectar);
    }
} else {
    echo "<script>alert('Dados inválidos!');</script>";
    echo "<script>location.href='lista_motos.php';</script>";
}
?>
