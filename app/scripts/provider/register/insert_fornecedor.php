<?php


include '../../../DAO/mySqlDao.php';
include '../../../models/fornecedor.php';
include '../../../models/endereco.php';
include '../../../DAO/fornecedorDAO.php';
include '../../../DAO/enderecoDAO.php';

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

$address = null;
$provider = new Fornecedor($id, $nome, $descricao, $telefone, $email);
if (!empty($id)) {
	$providerDAO->atualizar($provider);
	$address = $addressDAO->carregarIdFornecedor($id);
} else
	$providerDAO->inserir($provider);

if ($address == null)
	$addressDAO->inserirEnderecoFornecedor(new Endereco('', $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado, '', $id));
else {
	$address->setRua($rua);
	$address->setNumero($numero);
	$address->setComplemento($complemento);
	$address->setBairro($bairro);
	$address->setCep($cep);
	$address->setCidade($cidade);
	$address->setEstado($estado);
	$addressDAO->atualizar($address);
}

header('location:/gestorvendas/app/pages/provider/list/list-provider.php');
