<?php 

include '../../../scripts/conexao/conexao.php';

//$query = "SELECT * FROM estoque";

$query = "SELECT produto.id, produto.FornecedorID, produto.nome, estoque.quantidade, estoque.preco, estoque.ProdutoID as produto_id, fornecedor.id, fornecedor.nome as fornecedor_nome
			FROM produto, estoque, fornecedor
			WHERE produto.id = estoque.ProdutoID AND produto.FornecedorID = fornecedor.id";
$find_user = mysqli_query($conexao, $query);