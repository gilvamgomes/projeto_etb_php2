<?php
if ($_SESSION['funcao_usuario'] == 'Administrador') {
?>
<ul>
    <li><a href="administracao.php" class="active">Administração</a></li>
    <li><a href="lista_funcionarios.php">Funcionários</a></li>
    <li><a href="lista_motos.php">Motos</a></li>
    <li><a href="cadastra_cliente.php">Cadastrar Cliente</a></li>
    <li><a href="cadastra_funcionario.php">Cadastrar Funcionário</a></li>
    <li><a href="cadastra_moto.php">Cadastrar Moto</a></li> 
    <li><a href="registro_venda.php">Vendas</a></li>
    <li><a href="relatorio_estoque.php">Relatório de Estoque</a></li>
    <li><a href="relatorio_vendas.php">Relatório de Vendas</a></li> 
    <li><a href="logout.php" style="color: red;">Sair</a></li>
</ul>
<?php
} elseif ($_SESSION['funcao_usuario'] == 'Vendedor') {
?>
<ul>
    <li><a href="administracao.php">Administração</a></li>
    <li><a href="lista_motos.php">Motos</a></li>
    <li><a href="cadastra_moto.php">Cadastrar Moto</a></li>
    <li><a href="logout.php" style="color: red;">Sair</a></li>
</ul>
<?php
} else {
?>
<ul>
    <li><a href="administracao.php" class="active">Administração</a></li>
    <li><a href="vendas.php">Vendas</a></li>
    <li><a href="logout.php" style="color: red;">Sair</a></li>
</ul>
<?php
}
?>
