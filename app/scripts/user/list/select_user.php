<?php 

include '../../../models/user.php';
include '../../../DAO/userDAO.php';
$userDao = new UserDAO();

$users = $userDao->getAllUsers();
