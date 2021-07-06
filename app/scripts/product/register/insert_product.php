<?php

include '../../../DAO/mySqlDao.php';
include '../../../DAO/produtoDAO.php';
include '../../../models/produto.php';

$productDAO = new ProdutoDAO();

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$providerId = $_POST['providerId'];
$tempName = $_FILES['picture']["tmp_name"];
$realName = $_FILES['picture']["name"];
$pathName = '';
if ($realName != '') {
    $realName = str_replace(" ", "_", $realName);
    $pathName = "shared/upload/$realName";
    copy($tempName, '../../../' . $pathName);
}

$product = new Produto($id, $name, $description, $pathName, $providerId);
if (!empty($id))
    $productDAO->atualizar($product);
else
    $productDAO->inserir($product);

header('location:../../../pages/product/list/list-product.php');
