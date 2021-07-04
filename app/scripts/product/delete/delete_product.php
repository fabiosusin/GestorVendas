<?php

include '../../../DAO/mySqlDao.php';
include '../../../DAO/produtoDAO.php';
include '../../../models/produto.php';

$productDAO = new ProdutoDAO();

$id = $_GET['id'];

$productDAO->deletar($id);

header('location:../../../pages/product/list/list-product.php');
