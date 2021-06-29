<?php

#Conexão com o banco de dados MYSQL *******************************
$servidor = "localhost";
$usuario = "root";
$bdSenha = "";
$database = "gestorvendas";

$conexao = mysqli_connect($servidor, $usuario, $bdSenha, $database);
