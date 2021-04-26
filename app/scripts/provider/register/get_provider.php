<?php

include '../../../scripts/conexao/conexao.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$nome = '';
$telefone = '';
$email = '';
$descricao = '';
$rua = '';
$numero = '';
$complemento = '';
$bairro = '';
$cep = '';
$cidade = '';
$estado = '';

if (isset($id)) {
    $query = "SELECT * FROM fornecedor WHERE id = $id";
    $find = mysqli_query($conexao, $query);
    while ($line = mysqli_fetch_array($find)) {
        $nome = $line['nome'];
        $descricao = $line['descricao'];
        $telefone = $line['telefone'];
        $email = $line['email'];        
        /*$rua = $line['rua'];
        $numero = $line['numero'];
        $complemento = $line['complemento'];
        $bairro = $line['bairro'];
        $cep = $line['cep'];
        $cidade = $line['cidade'];
        $estado = $line['estado'];*/
    }
}
