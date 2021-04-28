<?php 

include '../../../scripts/conexao/conexao.php';

$query = "SELECT * FROM estoque";
$find_user = mysqli_query($conexao, $query);