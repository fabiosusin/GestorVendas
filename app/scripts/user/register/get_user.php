<?php

include '../../../scripts/conexao/conexao.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$nome = '';
$telefone = '';
$email = '';
$senha = '';
$cartao = '';
$rua = '';
$numero = '';
$complemento = '';
$bairro = '';
$cep = '';
$cidade = '';
$estado = '';

if (!empty($id)) {
    $query = "SELECT * FROM cliente WHERE id = $id";
    $find = mysqli_query($conexao, $query);
        while ($line = mysqli_fetch_array($find)) {
            $nome = $line['nome'];
            $cartao = $line['cartaoCredito'];
            $telefone = $line['telefone'];
            $email = $line['email'];        

        if (isset($id)) {
            $query_endereco = "SELECT * FROM endereco WHERE ClienteID = '$id' limit 1";
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