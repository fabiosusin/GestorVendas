<?php

include '../../../DAO/mySqlDao.php';
include '../../../DAO/produtoDAO.php';
include '../../../DAO/fornecedorDAO.php';

$productDAO = new ProdutoDAO();
$providerDAO = new FornecedorDAO();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$name = '';
$description = '';
$provider = '';

$providers = $providerDAO->listarTodos();

if (isset($id)) {
    $product = $productDAO->carregar($id);
    if (!isset($product))
        return;

    $description = $product->getDescricao();
    $name = $product->getNome();
    $providerId = $product->getFornecedorID();

    if (isset($providerId)) {
        $providerModel = $providerDAO->carregar($providerId);
        if (isset($providerModel))
            return;
        $provider = $providerModel->getNome();
    }
}
