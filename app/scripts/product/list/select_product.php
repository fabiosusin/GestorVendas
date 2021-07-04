<?php 

include '../../../DAO/mySqlDao.php';
include '../../../models/produto.php';
include '../../../DAO/produtoDAO.php';

$product = new ProdutoDAO();
$products = $product->listarTodos();
