<?php
$host = "127.0.0.1";
$user = "root";
$password = ""; // Adicione sua senha aqui, se necessário
$dbname = "moto";

$conectar = mysqli_connect($host, $user, $password, $dbname);

if (!$conectar) {
    die("Conexão falhou: " . mysqli_connect_error());
}



/*arquivo chamado db_config.php para centralizar a conexão com o banco*/

?>


