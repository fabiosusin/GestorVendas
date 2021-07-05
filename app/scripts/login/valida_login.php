<?php

include '../../../app/DAO/mySqlDao.php';
include '../../../app/DAO/userDAO.php';
include '../../../app/models/user.php';

$userDAO = new UserDAO();

$usuario = addslashes($_POST['usuario']);
$senha = addslashes($_POST['senha']);

$user = $userDAO->getByUserAndPassword($usuario, $senha);

if (isset($user)) {
	session_start();
	$_SESSION['login'] = true;
	$_SESSION['usuario'] = $usuario;

	header('location:../../pages/home/site.php');
} else
	header('location:/gestorvendas/app/pages/login/login.php');
