<?php 


include '../../../DAO/mySqlDao.php';
include '../../../models/fornecedor.php';
include '../../../DAO/fornecedorDAO.php';
include '../../../DAO/enderecoDAO.php';

$providerDAO = new FornecedorDAO();
$addressDAO = new EnderecoDAO();

$id = $_GET['id'];

$providerDAO->deletar($id);
$addressDAO->deletarFornecedorId($id);

header('location:../../../pages/provider/list/list-provider.php');