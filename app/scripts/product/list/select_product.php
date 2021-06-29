<?php 

include '../../../scripts/conexao/conexao.php';

$query = "SELECT 
			produto.id, 
			produto.nome, 
			produto.descricao, 
			produto.FornecedorID, 
			fornecedor.nome as fornecedor_nome, fornecedor.id as fornecedor_id
FROM produto, fornecedor
WHERE produto.FornecedorID = fornecedor.id";
			
$find_products = mysqli_query($conexao, $query);
