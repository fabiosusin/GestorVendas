<?php
//Conexão com o banco de dados MYSQL *******************************
$servidor = "localhost";
$usuario = "root";
$bdSenha = "";
//$bdSenha = "123gio123";
$database = "gestorvendas";

$conexao = mysqli_connect($servidor, $usuario, $bdSenha, $database);
?>