<?php 

include '../../../DAO/mySqlDao.php';
include '../../../models/user.php';
include '../../../DAO/userDAO.php';

$id = $_GET['id'];
$userDao = new UserDAO();
$userDao->deletebyId($id);

header('location:../../../pages/user/list/list-user.php');