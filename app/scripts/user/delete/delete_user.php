<?php 

include '../../../scripts/conexao/conexao.php';
include_once('./app/models/user.php');
include_once('./app/DAO/userDAO.php');

$id = $_GET['id'];
$userDao = new UserDAO();
$userDao->deletebyId($id);


header('location:../../../pages/user/list/list-user.php');