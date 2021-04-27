<?php

include '../../../scripts/conexao/conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$descricao = $_POST['descricao'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];



if (!empty($id)) {
	$query_updateFornecedor = "UPDATE fornecedor SET 
		nome='$nome', 
		telefone='$telefone',
		email='$email',
		descricao='$descricao' 
		WHERE id = $id";
    mysqli_query($conexao, $query_updateFornecedor);

    $query_updateEndereco = "UPDATE endereco SET 
    	rua='$rua', 
    	numero='$numero',
    	complemento='$complemento',  
    	bairro='$bairro',
    	cep='$cep',
    	cidade='$cidade',
    	estado='$estado'
	    WHERE FornecedorID = $id";
    mysqli_query($conexao, $query_updateEndereco);  
}

else{

	$query_fornecedor = "INSERT INTO fornecedor(nome, telefone, email, descricao) VALUES ('$nome','$telefone','$email','$descricao')";
	mysqli_query($conexao, $query_fornecedor);

	if ($query_fornecedor == true) {
		$last_id = mysqli_insert_id($conexao);

		$query = "INSERT INTO ENDERECO(rua, numero, complemento, bairro, cep, cidade, estado, fornecedorID) VALUES('$rua', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado', $last_id)";
		mysqli_query($conexao, $query);
	} else {
		echo "SQL ERROR " . mysqli_error($conexao);
	}
}

header('location:/gestorvendas/app/pages/provider/list/list-provider.php');

?>