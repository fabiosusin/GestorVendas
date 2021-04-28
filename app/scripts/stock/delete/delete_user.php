<?php 

include '../../../scripts/conexao/conexao.php';

$id = $_GET['id'];


$query = "DELETE FROM estoque WHERE id = $id";	
mysqli_query($conexao, $query);

header('location:../../../pages/stock/list/list-stock.php');