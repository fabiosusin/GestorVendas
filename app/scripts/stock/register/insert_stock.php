<?php

include '../../../DAO/mySqlDao.php';
include '../../../DAO/estoqueDAO.php';
include '../../../models/estoque.php';

$stockDAO = new EstoqueDAO();

$id = $_POST['id'];
$productId = $_POST['product'];
$type = $_POST['type'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$stock = $stockDAO->carregar($id);
$currentQuantity =  isset($stock) ?  $stock->getQuantidade() : 0;
if (isset($price)) {
    $price = (float)str_replace(',', '.', $price);
}

$quantity *= $type == 'Entrada' ? 1 : -1;
$quantity += $currentQuantity;
if (!empty($id))
    $stockDAO->atualizar(new Estoque($id, $quantity, $price, $productId));
else
    $stockDAO->inserir(new Estoque($id, $quantity, $price, $productId));

header('location:../../../pages/stock/list/list-stock.php');
