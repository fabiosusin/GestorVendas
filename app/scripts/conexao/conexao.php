<?php

#Conexão com o banco de dados MYSQL *******************************
$servidor = "localhost";
$usuario = "william";
$bdSenha = "teste";
$database = "gestorvendas";

$conexao = mysqli_connect($servidor, $usuario, $bdSenha, $database);
