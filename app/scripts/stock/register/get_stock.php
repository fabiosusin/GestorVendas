<?php

include '../../../scripts/conexao/conexao.php';

$id =  isset($_GET['id']) ? $_GET['id'] : '';
$product = '';
$type = 'Entrada';
$quantity = '';
$price = '';


$query = "SELECT 
          produto.id, produto.nome as produto_nome
          FROM 
          produto 
          WHERE produto.id
          not in ( select estoque.ProdutoID FROM estoque)";
$consulta_products_estoque = mysqli_query($conexao, $query);

if (!empty($id)) {
    $query = "SELECT * FROM estoque WHERE id = $id";
    $find = mysqli_query($conexao, $query);
    while ($line = mysqli_fetch_array($find)) {
        $quantity = $line['quantidade'];
        $price = $line['preco'];
        $productId = $line['ProdutoID'];

        if (isset($productId)) {
            $query_Product = "SELECT * FROM produto WHERE id = '$productId' limit 1";
            $findProduct = mysqli_query($conexao, $query_Product);

            while ($productRow = mysqli_fetch_array($findProduct))
                $product = $productRow["nome"];
        }
    }
}
