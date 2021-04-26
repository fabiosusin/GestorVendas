<?php

include '../../scripts/conexao/conexao.php';

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

$query_fornecedor = "INSERT INTO fornecedor(nome, telefone, email, descricao) VALUES ('$nome','$telefone','$email','$descricao')";
mysqli_query($conexao, $query_fornecedor);

if ($query_fornecedor == true) {
	$last_id = mysqli_insert_id($conexao);

	$query = "INSERT INTO ENDERECO(rua, numero, complemento, bairro, cep, cidade, estado, fornecedorID) VALUES('$rua', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado', $last_id)";
	mysqli_query($conexao, $query);
} else {
	echo "SQL ERROR " . mysqli_error($conexao);
}

header('location:../../pages/register-provider/register-provider.php');


?>