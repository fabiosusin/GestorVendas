<?php 

include '../../../scripts/conexao/conexao.php';

$id = $_GET['id'];

$query = "DELETE FROM FORNECEDOR WHERE id = $id";	
mysqli_query($conexao, $query);

header('location:../../../pages/provider/list/list-provider.php');