<?php

include 'verifica_sessao.php';
include 'conexao.php'; // Conexão com o banco de dados

var_dump($_POST); // Para ver se os dados estão sendo passados corretamente
exit;

// Recuperar os dados enviados do formulário
$cliente = $_POST['cliente'];
$moto = $_POST['moto'];
$valor_total = $_POST['valor_total'];
$valor_entrada = $_POST['valor_entrada'];
$forma_pagamento = $_POST['forma_pagamento'];
$num_parcelas = $_POST['num_parcelas'];

// Verificar se os campos obrigatórios foram preenchidos
if (empty($cliente) || empty($moto) || empty($valor_total) || empty($forma_pagamento)) {
    echo "<script>alert('Todos os campos obrigatórios devem ser preenchidos!');</script>";
    echo "<script>location.href='registra_venda.php';</script>";
    exit;
}

// Adicionar a data e hora atuais
$data = date('Y-m-d');
$hora = date('H:i:s');

// Inserir os dados na tabela `venda`
$sql = "INSERT INTO venda (Data, Hora, Valor_total, Valor_entrada, Forma_de_pagamento, Num_parcelas, Cod_cliente, Cod_moto, Cod_funcionario) 
        VALUES ('$data', '$hora', '$valor_total', '$valor_entrada', '$forma_pagamento', '$num_parcelas', '$cliente', '$moto', '{$_SESSION['cod_usuario']}')";

if (mysqli_query($conectar, $sql)) {
    echo "<script>alert('Venda registrada com sucesso!');</script>";
    echo "<script>location.href='relatorio_vendas.php';</script>";
} else {
    echo "Erro ao registrar venda: " . mysqli_error($conectar);
}

?>
