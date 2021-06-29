<?php 

include '../../../scripts/conexao/conexao.php';

$query = "SELECT * FROM CLIENTE";
$find_user = mysqli_query($conexao, $query);