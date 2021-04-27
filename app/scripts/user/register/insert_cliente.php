<?php

include '../../../scripts/conexao/conexao.php';

$id = $_POST['id'];
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

if (!empty($id)) {
	
	$query_updateCliente = "UPDATE CLIENTE SET nome='$nome', cartaoCredito='$cartao' WHERE id = $id";
    mysqli_query($conexao, $query_updateCliente);

    $query_updateEndereco = "UPDATE ENDERECO SET rua='$rua', numero='$numero' WHERE ClienteID = $id";
    mysqli_query($conexao, $query_updateEndereco);

    //echo($query_updateCliente);
}

else{

	$query_cliente = "INSERT INTO cliente(nome, telefone, email, cartaoCredito) VALUES ('$nome','$telefone','$email','$cartao')";
	mysqli_query($conexao, $query_cliente);

	if ($query_cliente == true) {
		$last_id = mysqli_insert_id($conexao);

		$query = "INSERT INTO ENDERECO(rua, numero, complemento, bairro, cep, cidade, estado, clienteID) VALUES('$rua', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado', $last_id)";
		mysqli_query($conexao, $query);
	} else {
		echo "SQL ERROR " . mysqli_error($conexao);
	}
}

header('location:/gestorvendas/app/pages/user/list/list-user.php');

?>