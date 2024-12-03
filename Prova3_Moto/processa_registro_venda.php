<?php
session_start();
include 'verifica_sessao.php';
include 'conexao.php';

// Receber dados do formulário
$cliente = $_POST['cliente'];
$moto = $_POST['moto'];
$valor_total = $_POST['valor_total'];
$valor_entrada = $_POST['valor_entrada'];
$forma_pagamento = $_POST['forma_pagamento'];
$num_parcelas = $_POST['num_parcelas'];
$funcionario = $_SESSION['cod_usuario']; // Funcionário que está realizando a venda
$nome_funcionario = $_SESSION['nome_usuario']; // Nome do funcionário (responsável pela venda)
$data = date('Y-m-d');
$hora = date('H:i:s');

// Verificar se todos os campos obrigatórios estão preenchidos
if (empty($cliente) || empty($moto) || empty($valor_total) || empty($forma_pagamento)) {
    echo "<script>alert('Todos os campos obrigatórios devem ser preenchidos!');</script>";
    echo "<script>location.href='registro_venda.php';</script>";
    exit;
}

// Inserir a venda no banco de dados
$sql = "INSERT INTO venda (Data, Hora, Cod_cliente, Cod_moto, Cod_fun, Responsavel_pela_venda, Valor_total_venda, Valor_de_entrada, Forma_de_pagamento, Numero_de_parcelas, Status_da_venda) 
        VALUES ('$data', '$hora', '$cliente', '$moto', '$funcionario', '$nome_funcionario', '$valor_total', '$valor_entrada', '$forma_pagamento', '$num_parcelas', 'Concluída')";

if (mysqli_query($conectar, $sql)) {
    echo "<script>alert('Venda registrada com sucesso!');</script>";
    echo "<script>location.href='administracao.php';</script>";
} else {
    echo "Erro ao registrar a venda: " . mysqli_error($conectar);
}

// Fechar conexão
mysqli_close($conectar);
?>
