<?php

include '../../../scripts/conexao/conexao.php';

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
    copy($tempName, $pathName);
}

if (!empty($id)) {
    $query_product = "UPDATE produto SET nome='$name', descricao='$description', fotoUrl='$pathName', FornecedorID='$providerId' WHERE id = $id";
    mysqli_query($conexao, $query_product);

    echo($query_product);
    
} else {
    $query_product = "INSERT INTO produto(nome, descricao, fotoUrl, FornecedorID) VALUES ('$name','$description','$pathName','$providerId')";
    mysqli_query($conexao, $query_product);
}



//header('location:../../../pages/product/list/list-product.php');
