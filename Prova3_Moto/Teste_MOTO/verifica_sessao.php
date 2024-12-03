<?php
session_start();
if (!isset($_SESSION['nome_usuario'])) {
    echo "<script>alert('Você não está logado no sistema da Loja de Motos!')</script>";
    echo "<script>location.href='index.php'</script>";
    exit();
}
?>
