<?php
session_start();
include 'verifica_sessao.php';
include 'conexao.php';

// Receber os dados do formulário
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$funcao = $_POST['funcao'];
$status = $_POST['status'];

// Verificar se os campos estão preenchidos
if (empty($nome) || empty($login) || empty($senha) || empty($funcao) || empty($status)) {
    echo "<script>alert('Todos os campos devem ser preenchidos!');</script>";
    echo "<script>location.href='cadastra_funcionario.php';</script>";
    exit;
}

// Query para inserir o funcionário no banco
$sql = "INSERT INTO funcionarios (NOME_FUN, LOGIN_FUN, SENHA_FUN, FUNCAO_FUN, STATUS_FUN) 
        VALUES ('$nome', '$login', '$senha', '$funcao', '$status')";

// Executar a query
if (mysqli_query($conectar, $sql)) {
    echo "<script>alert('Funcionário cadastrado com sucesso!');</script>";
    echo "<script>location.href='lista_funcionarios.php';</script>";
} else {
    echo "Erro ao cadastrar funcionário: " . mysqli_error($conectar);
}

// Fechar a conexão
mysqli_close($conectar);
?>
