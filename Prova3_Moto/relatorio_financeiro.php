<?php
include 'verifica_sessao.php';
verifica_acesso('Administrador'); // Apenas administradores podem acessar esta página
?>
<h1>Relatório Financeiro</h1>
<!-- Código para gerar o relatório -->


<?php
include 'db_config.php';

echo "<h1>Relatório Financeiro</h1>";
$sql = "SELECT SUM(Valor_total) AS total_vendas FROM venda";
$resultado = mysqli_query($conectar, $sql);
$total = mysqli_fetch_assoc($resultado)['total_vendas'];

if ($total) {
    echo "<p>Total arrecadado com vendas: R$ $total</p>";
} else {
    echo "<p>Nenhuma venda registrada ainda.</p>";
}

mysqli_close($conectar);

/*Relatório financeiro com o total de vendas*/
?>

