<?php
include 'verifica_sessao.php';
include 'conexao.php';

// Receber os dados do formulário
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$cnh = $_POST['cnh'];
$data_nascimento = $_POST['data_nascimento'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

// Verificar se todos os campos obrigatórios estão preenchidos
if (empty($nome) || empty($cpf) || empty($rg) || empty($data_nascimento) || empty($endereco) || empty($telefone) || empty($email)) {
    echo "<script>alert('Todos os campos devem ser preenchidos!');</script>";
    echo "<script>location.href='cadastra_cliente.php';</script>";
    exit;
}

// Inserir no banco de dados
$sql = "INSERT INTO cliente (Nome, Cpf, Rg, Cnh, Data_de_nascimento, Endereco, Telefone, Email) 
        VALUES ('$nome', '$cpf', '$rg', '$cnh', '$data_nascimento', '$endereco', '$telefone', '$email')";

if (mysqli_query($conectar, $sql)) {
    echo "<script>alert('Cliente cadastrado com sucesso!');</script>";
    echo "<script>location.href='administracao.php';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar cliente: " . mysqli_error($conectar) . "');</script>";
    echo "<script>location.href='cadastra_cliente.php';</script>";
}

// Fechar a conexão
mysqli_close($conectar);
?>
