<?php

include '../../../DAO/mySqlDao.php';
include '../../../DAO/estoqueDAO.php';

$id = $_GET['id'];

$stock = new EstoqueDAO();
$stocks = $stock->deletar($id);

header('location:../../../pages/stock/list/list-stock.php');
