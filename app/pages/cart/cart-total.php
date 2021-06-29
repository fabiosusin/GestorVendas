<?php
include_once("../../../app/scripts/conexao/conexao.php");

$data = json_decode($_POST['data']);
if (isset($data) || is_array($data) || is_object($data)) {
  $ids = [];
  foreach ($data as $value) {
    array_push($ids, $value->id);
  }

  $ids = isset($ids) && is_array($ids) ? implode(",", $ids) : null;
  $query = "SELECT * FROM estoque where ProdutoID  IN ($ids)";
  $consulta_products = mysqli_query($conexao, $query);

  $total = 0;
  while ($linha = mysqli_fetch_array($consulta_products)) {
    $index = array_search($linha['ProdutoID'], array_column($data, 'id'));
    $price = $linha['preco'];
    $total += $price * $data[$index]->quantity;
  }

  echo $total;
}
