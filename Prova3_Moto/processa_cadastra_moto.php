<?php
session_start();
include 'verifica_sessao.php';
include 'conexao.php';

// Receber os dados do formulário
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano_fabricacao = $_POST['ano_fabricacao'];
$cor = $_POST['cor'];
$numero_chassi = $_POST['numero_chassi'];
$cilindrada = $_POST['cilindrada'];
$tipo = $_POST['tipo'];
$preco_custo = $_POST['preco_custo'];
$preco_venda = $_POST['preco_venda'];
$quantidade_em_estoque = $_POST['quantidade_em_estoque'];
$tipo_de_combustivel = $_POST['tipo_de_combustivel'];
$potencia = $_POST['potencia'];
$sistema_de_freios = $_POST['sistema_de_freios'];
$abs = $_POST['abs'];
$peso = $_POST['peso'];
$capacidade_do_tanque = $_POST['capacidade_do_tanque'];
$tipo_de_partida = $_POST['tipo_de_partida'];
$status_de_disponibilidade = $_POST['status_de_disponibilidade'];

// Verificar se os campos obrigatórios estão preenchidos
if (empty($marca) || empty($modelo) || empty($ano_fabricacao) || empty($cor) || empty($numero_chassi) || empty($preco_venda) || empty($status_de_disponibilidade)) {
    echo "<script>alert('Todos os campos obrigatórios devem ser preenchidos!');</script>";
    echo "<script>location.href='cadastra_moto.php';</script>";
    exit;
}

// Query para inserir a moto no banco de dados
$sql = "INSERT INTO moto (Marca, Modelo, Ano_de_fabricacao, Cor, Numero_do_chassi, Cilindrada, Tipo, Preco_de_custo, Preco_de_venda, Quantidade_em_estoque, Tipo_de_combustivel, Potencia, Sistema_de_freios, Abs, Peso, Capacidade_do_tanque, Tipo_de_partida, Status_de_disponibilidade)
        VALUES ('$marca', '$modelo', '$ano_fabricacao', '$cor', '$numero_chassi', '$cilindrada', '$tipo', '$preco_custo', '$preco_venda', '$quantidade_em_estoque', '$tipo_de_combustivel', '$potencia', '$sistema_de_freios', '$abs', '$peso', '$capacidade_do_tanque', '$tipo_de_partida', '$status_de_disponibilidade')";

if (mysqli_query($conectar, $sql)) {
    echo "<script>alert('Moto cadastrada com sucesso!');</script>";
    echo "<script>location.href='lista_motos.php';</script>";
} else {
    echo "Erro ao cadastrar moto: " . mysqli_error($conectar);
}

// Fechar a conexão
mysqli_close($conectar);
?>
