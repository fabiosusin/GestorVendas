<?php

include '../../../scripts/conexao/conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cartao = $_POST['cartao'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

if (!empty($id)) {
	
	$query_updateCliente = "UPDATE CLIENTE SET 
		nome='$nome', 
		telefone='$telefone',
		email='$email',
		/*senha='$senha',*/
		cartaoCredito='$cartao'
		WHERE id = $id";
    mysqli_query($conexao, $query_updateCliente);

    $query_updateEndereco = "UPDATE ENDERECO SET 
    	rua='$rua', 
    	numero='$numero',
    	complemento='$complemento',  
    	bairro='$bairro',
    	cep='$cep',
    	cidade='$cidade',
    	estado='$estado'
    	WHERE ClienteID = $id";
    mysqli_query($conexao, $query_updateEndereco);
}

else{

	$query_cliente = "INSERT INTO cliente(nome, telefone, email, cartaoCredito) VALUES ('$nome','$telefone','$email','$cartao')";
	mysqli_query($conexao, $query_cliente);

	if ($query_cliente == true) {
		$last_id = mysqli_insert_id($conexao);

		$query_usuarios = "INSERT INTO USUARIOS(nome, login, senha, perfilID, clienteID) VALUES('$nome','$email', '$senha',2,$last_id)";
		mysqli_query($conexao, $query_usuarios);

		$query_endereco = "INSERT INTO ENDERECO(rua, numero, complemento, bairro, cep, cidade, estado, clienteID) VALUES('$rua', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado', $last_id)";
		mysqli_query($conexao, $query_endereco);
	} else {
		echo "SQL ERROR " . mysqli_error($conexao);
	}
}

header('location:/gestorvendas/app/pages/user/list/list-user.php');

?>