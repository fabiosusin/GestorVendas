<?php

include '../../../app/DAO/mySqlDao.php';
include '../../../app/DAO/userDAO.php';
include '../../../app/models/user.php';

$userDAO = new UserDAO();

$usuario = addslashes($_POST['usuario']);
$senha = addslashes($_POST['senha']);

$admin = $senha == 'nest' && $usuario == 'teste@teste.com';
$user = $userDAO->getByUserAndPassword($usuario, $senha);

if (isset($user) || $admin) {
	session_start();
	$_SESSION['usuario'] = $usuario;
	$_SESSION['admin'] = $admin;
	$_SESSION['logged'] = true;

	header('location:../../pages/home/site.php');
} else
	header('location:/gestorvendas/app/pages/login/login.php');
