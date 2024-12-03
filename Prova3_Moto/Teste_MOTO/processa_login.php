<?php
session_start();
include 'conexao.php'; 

// Conexão com o banco de dados
$conectar = mysqli_connect("localhost", "root", "", "moto");
if (!$conectar) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

$login = $_POST['login'];
$senha = $_POST['senha'];

// Consulta para verificar login e senha
$sql_consulta = "SELECT Cod_Fun, Nome, Funcao, Login, Senha, Status 
                 FROM funcionarios 
                 WHERE Login = '$login' 
                 AND Senha = '$senha' 
                 AND Status = 'ATIVADO'";
$resultado_consulta = mysqli_query($conectar, $sql_consulta);

// Verifica se a consulta retornou resultados
if (!$resultado_consulta) {
    die("Erro na consulta SQL: " . mysqli_error($conectar));
}

$linhas = mysqli_num_rows($resultado_consulta);

if ($linhas == 1) {
    $registro = mysqli_fetch_assoc($resultado_consulta);
    $_SESSION['cod_usuario'] = $registro['Cod_Fun'];
    $_SESSION['nome_usuario'] = $registro['Nome']; //Difinir nome do Usuario
    $_SESSION['funcao_usuario'] = $registro['Funcao'];

    echo "<script>location.href='administracao.php'</script>";
} else {
    echo "<script>alert('Login ou Senha Incorretos! Digite Novamente!')</script>";
    echo "<script>location.href='index.php'</script>";
}
?>
