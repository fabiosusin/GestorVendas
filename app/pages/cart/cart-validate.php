<?php
include_once("../../../app/scripts/conexao/conexao.php");

$data = json_decode($_POST['data']);
if (!isset($data) || !is_array($data))
  return;
  
$ids = [];
foreach ($data as $value) {
  array_push($ids, $value->id);
}

$ids = isset($ids) && is_array($ids) ? implode(",", $ids) : null;
$query = "SELECT * FROM produto LEFT JOIN estoque ON produto.id = estoque.ProdutoID  where ProdutoID  IN ($ids)";
$consulta_products = mysqli_query($conexao, $query);

$msg = '';
while ($linha = mysqli_fetch_array($consulta_products)) {
  $index = array_search($linha['ProdutoID'], array_column($data, 'id'));
  $quantity = $linha['quantidade'];
  if ($data[$index]->quantity > $quantity)
    $msg .= 'O Produto ' . $linha['nome']  . ' possui apenas ' . $quantity . ' unidades em estoque <br>';
}

echo $msg;
