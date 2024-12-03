<?php
include 'db_config.php';

$Cod_Fun = $_POST['Cod_Fun'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$funcao = $_POST['funcao'];
$status = $_POST['status'];

$sql = "UPDATE funcionarios SET Nome = '$nome', Cpf = '$cpf', Telefone = '$telefone', Email = '$email', Funcao = '$funcao', Status = '$status' WHERE Cod_Fun = '$Cod_Fun'";

if (mysqli_query($conectar, $sql)) {
    echo "Funcionário atualizado com sucesso!";
} else {
    echo "Erro ao atualizar funcionário: " . mysqli_error($conectar);
}

mysqli_close($conectar);

/*Script para salvar as alterações no banco*/
?>
