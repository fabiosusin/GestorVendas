<?php

include '../../../scripts/conexao/conexao.php';
include_once('./app/models/user.php');
include_once('./app/DAO/userDAO.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

$userDao = new UserDAO();
$user = $userDao->getById($id);

if(!isset($user))
    return;

$nome = $user->getNome();
$telefone = $user->getTelefone();
$email = $user->getEmail();
$cartao = $user->getCartao();
$rua = $user->getRua();
$numero = $user->getNumero();
$complemento = $user->getComplemento();
$bairro = $user->getBairro();
$cep = $user->getCep();
$cidade = $user->getCidade();
$estado = $user->getEstado();