<?php

include '../conexao/conexao.php';

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$cartao = $_POST['cartao'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

$query_cliente = "INSERT INTO cliente(nome, telefone, email, cartaoCredito) VALUES ('$nome','$telefone','$email','$cartao')";
mysqli_query($conexao, $query_cliente);

if ($query_cliente == true) {
	$last_id = mysqli_insert_id($conexao);

	$query = "INSERT INTO ENDERECO(rua, numero, complemento, bairro, cep, cidade, estado, clienteID) VALUES('$rua', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado', $last_id)";
	mysqli_query($conexao, $query);
} else {
	echo "SQL ERROR " . mysqli_error($conexao);
}

header('location:../../pages/register-user/register-user.php');


?>