<?php
include 'verifica_sessao.php';
include 'conexao.php';

$codFuncionario = $_GET['cod'];
$novoStatus = $_GET['status'];

// Atualizar o status do funcionário
$sql = "UPDATE funcionarios SET Status = '$novoStatus' WHERE Cod_Fun = $codFuncionario";
if (mysqli_query($conectar, $sql)) {
    echo "<script>alert('Status do funcionário atualizado com sucesso!');</script>";
} else {
    echo "<script>alert('Erro ao atualizar status: " . mysqli_error($conectar) . "');</script>";
}

echo "<script>location.href='lista_funcionarios.php';</script>";
