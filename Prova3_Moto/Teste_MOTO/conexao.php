<?php
// Configurações do banco de dados
$servidor = "localhost"; // Servidor
$usuario = "root";       // Usuário do banco de dados
$senha = "";             // Senha do banco de dados
$banco = "moto";         // Nome do banco de dados

// Criando a conexão com o banco de dados
$conectar = mysqli_connect($servidor, $usuario, $senha, $banco);

// Verificando a conexão
if (!$conectar) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}
?>
