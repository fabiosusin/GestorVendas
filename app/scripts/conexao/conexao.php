<?php

#Conexão com o banco de dados MYSQL *******************************
$servidor = "localhost";
$usuario = "root";
$bdSenha = "Losingtouch2018";
$database = "gestorvendas";

$conexao = mysqli_connect($servidor, $usuario, $bdSenha, $database);
