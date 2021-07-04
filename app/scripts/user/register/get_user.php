<?php

include '../../../DAO/mySqlDao.php';
include '../../../models/user.php';
include '../../../DAO/userDAO.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

$userDao = new UserDAO();
$user = $userDao->getById($id);

$senha = '';
$nome = '';
$telefone = '';
$email = '';
$cartao = '';
$rua = '';
$numero = '';
$complemento = '';
$bairro = '';
$cep = '';
$cidade = '';
$estado = '';

if (!isset($user))
    return;

$nome =         $user->getNome();
$senha =         $user->getSenha();
$telefone =     $user->getTelefone();
$email =        $user->getEmail();
$cartao =       $user->getCartao();
$rua =          $user->getRua();
$numero =       $user->getNumero();
$complemento =  $user->getComplemento();
$bairro =       $user->getBairro();
$cep =          $user->getCep();
$cidade =       $user->getCidade();
$estado =       $user->getEstado();
