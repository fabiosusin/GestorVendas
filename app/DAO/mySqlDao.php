<?php
class MySqlDAO
{

    #Conexão com o banco de dados MYSQL *******************************
    private $servidor = "localhost";
    private $usuario = "root";
    private $bdSenha = "";
    private $database = "gestorvendas";

    public $conn = mysqli_connect($servidor, $usuario, $bdSenha, $database);
}
