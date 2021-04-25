<?php

#Conexão com o banco de dados MYSQL *******************************
$servidor = "localhost";
$usuario = "root";
$senha = "Losingtouch2018";
$database = "gestorvendas";

$conexao = mysqli_connect($servidor, $usuario, $senha, $database);