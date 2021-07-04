<?php 

include '../../../DAO/mySqlDao.php';
include '../../../models/fornecedor.php';
include '../../../DAO/fornecedorDAO.php';

$provider = new FornecedorDAO();
$providers = $provider->listarTodos();
