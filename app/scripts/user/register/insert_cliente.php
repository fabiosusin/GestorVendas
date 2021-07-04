<?php

include '../../../DAO/mySqlDao.php';
include '../../../models/user.php';
include '../../../DAO/userDAO.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cartao = $_POST['cartao'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

$userDao = new UserDAO();
if (!empty($id))
	$userDao->update(new User($id, $senha, $nome, $email, $telefone, $cartao, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado));
else
	$userDao->insert(new User($id, $senha, $nome, $email, $telefone, $cartao, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado));

header('location:/gestorvendas/app/pages/user/list/list-user.php');
