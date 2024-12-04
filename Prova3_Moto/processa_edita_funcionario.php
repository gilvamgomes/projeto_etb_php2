<?php
include 'verifica_sessao.php';
include 'conexao.php';

if (isset($_POST['cod']) && isset($_POST['nome']) && isset($_POST['funcao']) && isset($_POST['status'])) {
    $cod = $_POST['cod'];
    $nome = $_POST['nome'];
    $funcao = $_POST['funcao'];
    $status = $_POST['status'];

    $sql = "UPDATE funcionarios SET Nome = '$nome', Funcao = '$funcao', Status = '$status' WHERE Cod_Fun = $cod";

    if (mysqli_query($conectar, $sql)) {
        echo "<script>alert('Funcionário atualizado com sucesso!');</script>";
        echo "<script>location.href='lista_funcionarios.php';</script>";
    } else {
        echo "Erro ao atualizar funcionário: " . mysqli_error($conectar);
    }
} else {
    echo "<script>alert('Dados inválidos!');</script>";
    echo "<script>location.href='lista_funcionarios.php';</script>";
}
?>
