<?php

include '../../../scripts/conexao/conexao.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$name = '';
$description = '';
$provider = '';

$query = "SELECT * FROM fornecedor";
$consulta_providers = mysqli_query($conexao, $query);

if (isset($id)) {
    $query = "SELECT * FROM `produto` WHERE id = '$id'";
    $find = mysqli_query($conexao, $query);
    while ($line = mysqli_fetch_array($find)) {
        $description = $line['descricao'];
        $name = $line['nome'];
        $providerId = $line['FornecedorID'];
    }

    if (isset($providerId)) {
        $query_provider = "SELECT * FROM `fornecedor` WHERE id = '$providerId' limit 1";
        $result_provider = mysqli_query($conexao, $query_provider);
        $provider = ($result_provider->fetch_assoc())["nome"];
    }
}
