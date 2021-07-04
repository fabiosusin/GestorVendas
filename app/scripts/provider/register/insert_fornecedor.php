<?php


include '../../../DAO/mySqlDao.php';
include '../../../models/fornecedor.php';
include '../../../models/endereco.php';
include '../../../DAO/fornecedorDAO.php';
include '../../../DAO/estoqueDAO.php';

$providerDAO = new FornecedorDAO();
$addressDAO = new EnderecoDAO();

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$descricao = $_POST['descricao'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];


$provider = new Fornecedor($id, $nome, $descricao, $telefone, $email);
$address = new Endereco('', $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado, '', $id);

if (!empty($id)) {
	$providerDAO->atualizar($provider);
	$addressDAO->atualizar($address);
} else {
	$providerDAO->inserir($provider);
	$addressDAO->inserir($address);
}

header('location:/gestorvendas/app/pages/provider/list/list-provider.php');
