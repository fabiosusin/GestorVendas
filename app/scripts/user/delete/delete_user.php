<?php 

include '../../../scripts/conexao/conexao.php';

$id = $_GET['id'];


$query = "DELETE FROM ENDERECO WHERE ClienteID = $id";	
mysqli_query($conexao, $query);

$query = "DELETE FROM CLIENTE WHERE id = $id";	
mysqli_query($conexao, $query);

header('location:../../../pages/user/list/list-user.php');