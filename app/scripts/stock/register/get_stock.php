<?php

include '../../../DAO/mySqlDao.php';
include '../../../DAO/estoqueDAO.php';
include '../../../models/estoque.php';
include '../../../DAO/produtoDAO.php';
include '../../../models/produto.php';

$stockDAO = new EstoqueDAO();
$productDAO = new ProdutoDAO();
$products = $productDAO->listarTodos();

$id =  isset($_GET['id']) ? $_GET['id'] : '';
$product = '';
$type = 'Entrada';
$quantity = '';
$price = '';

$stock = $stockDAO->carregar($id);
echo $id;
if (!isset($stock))
    return;

$price =  $stock->getPreco();
$productId = $stock->getProdutoID();
