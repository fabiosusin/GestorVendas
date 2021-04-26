<?php 

include '/wamp64/www/GestorVendas/app/scripts/conexao/conexao.php';

$query = "SELECT * FROM Produto";
			
$find_products = mysqli_query($conexao, $query);
