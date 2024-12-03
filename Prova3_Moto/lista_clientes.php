<?php
include 'db_config.php';

echo "<h1>Lista de Clientes</h1>";
$sql = "SELECT * FROM cliente";
$resultado = mysqli_query($conectar, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<table border='1'>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>";
    while ($cliente = mysqli_fetch_assoc($resultado)) {
        echo "<tr>
                <td>{$cliente['Nome']}</td>
                <td>{$cliente['Cpf']}</td>
                <td>{$cliente['Telefone']}</td>
                <td>{$cliente['Email']}</td>
                <td>
                    <a href='edita_cliente.php?Cod_cliente={$cliente['Cod_cliente']}'>Editar</a> |
                    <a href='exclui_cliente.php?Cod_cliente={$cliente['Cod_cliente']}'>Excluir</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum cliente cadastrado.";
}

mysqli_close($conectar);

/*Exibe todos os clientes cadastrados*/
?>
