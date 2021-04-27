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

if (!empty($id)) {
    $query = "SELECT * FROM fornecedor WHERE id = $id";
    $find = mysqli_query($conexao, $query);
    while ($line = mysqli_fetch_array($find)) {
        $nome = $line['nome'];
        $descricao = $line['descricao'];
        $telefone = $line['telefone'];
        $email = $line['email'];        

    if (isset($id)) {
        $query_endereco = "SELECT * FROM endereco WHERE FornecedorID = '$id' limit 1";
        $findEndereco = mysqli_query($conexao, $query_endereco);
        
        while ($endereco = mysqli_fetch_array($findEndereco)) {
            
            $rua = $endereco["rua"];
            $numero = $endereco['numero'];
            $complemento = $endereco['complemento'];
            $bairro = $endereco['bairro'];
            $cep = $endereco['cep'];
            $cidade = $endereco['cidade'];
            $estado = $endereco['estado'];
        }
    }
}
}