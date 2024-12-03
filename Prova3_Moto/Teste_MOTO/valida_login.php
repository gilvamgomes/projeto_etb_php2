<?php
    // Verifica se a sessão do usuário está ativa
    if (isset($_SESSION["nome_fun"])) {
        // Exibe o nome do funcionário logado
        echo $_SESSION["nome_fun"];
    } else {
        // Exibe uma mensagem de alerta e redireciona para a página de login
        echo "<script> 
                alert('Você não está logado no sistema da Loja de Motos!');
              </script>";
        echo "<script> 
                location.href = ('index.php');
              </script>";
        exit; // Garante que o restante do código não será executado
    }
?>
