<?php 

include '../../../scripts/conexao/conexao.php';

$query = "SELECT * FROM FORNECEDOR";
$find_providers = mysqli_query($conexao, $query);