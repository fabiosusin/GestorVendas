<?php 

include '/wamp64/www/GestorVendas/app/scripts/conexao/conexao.php';

$id = $_GET['id'];

$query = "DELETE FROM produto WHERE id = $id";

mysqli_query($conexao, $query);

header('location:../../../pages/product/list/list-product.php');