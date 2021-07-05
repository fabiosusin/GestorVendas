<?php
class MySqlDAO
{

    #Conexão com o banco de dados MYSQL *******************************
    private $servidor = "localhost";
    private $usuario = "root";
    //private $bdSenha = "";
    private $bdSenha = "123loja123";
    private $database = "gestorvendas";
    public $conn;

    // get the database connection
    public function getConnection()
    {

        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=gestorvendas',  $this->usuario,  $this->bdSenha);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
