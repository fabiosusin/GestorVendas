<?php 

include '../../../DAO/mySqlDao.php';
include '../../../DAO/estoqueDAO.php';
include '../../../models/estoque.php';

$stock = new EstoqueDAO();
$stocks = $stock->listarTodos();
