<?php


include '../../../DAO/mySqlDao.php';
include '../../../models/fornecedor.php';
include '../../../DAO/fornecedorDAO.php';
include '../../../DAO/enderecoDAO.php';

$providerDAO = new FornecedorDAO();
$addressDAO = new EnderecoDAO();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$nome = '';
$telefone = '';
$email = '';
$descricao = '';
$rua = '';
$numero = '';
$complemento = '';
$bairro = '';
$cep = '';
$cidade = '';
$estado = '';

if (!empty($id)) {
    $provider = $providerDAO->carregar($id);
    if (!isset($provider))
        return;

    $nome = $provider->getnome();
    $descricao = $provider->getDescricao();
    $telefone = $provider->getTelefone();
    $email = $provider->getEmail();

    $address = $addressDAO->carregarIdFornecedor($id);

    if (isset($address)) {

        $rua = $address->getRua();
        $numero = $address->getNumero();
        $complemento = $address->getComplemento();
        $bairro = $address->getBairro();
        $cep = $address->getCep();
        $cidade = $address->getCidade();
        $estado = $address->getEstado();
    }
}
