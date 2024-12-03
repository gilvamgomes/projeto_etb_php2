<?php
include 'verifica_sessao.php';
include 'conexao.php'; // Conexão com o banco de dados

// Recebendo os dados do formulário
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$nascimento = $_POST['nascimento'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$funcao = $_POST['funcao'];

// Verificar se os campos estão preenchidos
if (
    empty($nome) || empty($cpf) || empty($rg) || empty($nascimento) ||
    empty($endereco) || empty($telefone) || empty($email) ||
    empty($login) || empty($senha) || empty($funcao)
) {
    echo "<script>alert('Todos os campos devem ser preenchidos!');</script>";
    echo "<script>location.href='cadastra_funcionario.php';</script>";
    exit;
}

// Inserir os dados no banco
$sql = "INSERT INTO funcionarios 
        (Nome, Cpf, Rg, Nascimento, Endereco, Telefone, Email, Login, Senha, Funcao, Status, Admissao) 
        VALUES 
        ('$nome', '$cpf', '$rg', '$nascimento', '$endereco', '$telefone', '$email', '$login', '$senha', '$funcao', 'ATIVADO', NOW())";

if (mysqli_query($conectar, $sql)) {
    echo "<script>alert('Funcionário cadastrado com sucesso!');</script>";
    echo "<script>location.href='lista_funcionarios.php';</script>";
} else {
    echo "Erro ao cadastrar funcionário: " . mysqli_error($conectar);
}

// Fechar a conexão
mysqli_close($conectar);
?>
