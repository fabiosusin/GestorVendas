<?php

include '../../../scripts/conexao/conexao.php';

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$provider = $_POST['provider'];

$query_provider = "SELECT * FROM `fornecedor` WHERE nome = '$provider' limit 1";
$result = mysqli_query($conexao, $query_provider);
$providerId = ($result->fetch_assoc())["id"];

if (!empty($id)) {
    $query_product = "UPDATE produto SET nome='$name', descricao='$description', foto='', FornecedorID='$providerId' WHERE id = $id";
    mysqli_query($conexao, $query_product);
} else {
    $query_product = "INSERT INTO produto(nome, descricao, foto, FornecedorID) VALUES ('$name','$description','','$providerId')";
    mysqli_query($conexao, $query_product);
}

header('location:/pages/product/list/list-product.php');
