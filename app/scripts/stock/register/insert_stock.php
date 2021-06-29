<?php

include '../../../scripts/conexao/conexao.php';

$id = $_POST['id'];
$productId = $_POST['product'];
$type = $_POST['type'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

if (isset($price)) {
    $price = (float)str_replace(',', '.', $price);
}

$quantity *= $type == 'Entrada' ? 1 : -1;

if (!empty($id)) {
    $query_stock = "UPDATE estoque SET quantidade='$quantity', preco='$price', ProdutoID='$productId' WHERE id = $id";
    mysqli_query($conexao, $query_stock);
} else {
    $query_stock = "INSERT INTO estoque(quantidade, preco, ProdutoID) VALUES ('$quantity','$price','$productId')";
    mysqli_query($conexao, $query_stock);
}

header('location:../../../pages/stock/list/list-stock.php');
