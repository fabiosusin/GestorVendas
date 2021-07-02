<?php

//include '../../models/user.php';
include 'mySqlDao.php';

class UserDAO// extends MySqlDao
{

    public function insert($usuario)
    {
        $nome = $usuario->getNome();
        $estado = $usuario->getEstado();
        $cidade = $usuario->getCidade();
        $cep = $usuario->getCep();
        $bairro = $usuario->getBairro();
        $complemento = $usuario->getComplemento();
        $numero = $usuario->getNumero();
        $rua = $usuario->getRua();
        $cartao = $usuario->getCartao();
        $email = $usuario->getEmail();
        $telefone = $usuario->getTelefone();
        $senha = $usuario->getSenha();

        $query_cliente = "INSERT INTO cliente(nome, telefone, email, cartaoCredito) VALUES ('$nome','$telefone','$email','$cartao')";
        mysqli_query($this->conn, $query_cliente);

        if ($query_cliente == true) {
            $last_id = mysqli_insert_id($this->conn);

            $query_usuarios = "INSERT INTO USUARIOS(nome, login, senha, perfilID, clienteID) VALUES('$nome','$email', '$senha',2,$last_id)";
            mysqli_query($this->conn, $query_usuarios);

            $query_endereco = "INSERT INTO ENDERECO(rua, numero, complemento, bairro, cep, cidade, estado, clienteID) VALUES('$rua', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado', $last_id)";
            mysqli_query($this->conn, $query_endereco);
        } else {
            echo "SQL ERROR " . mysqli_error($this->conn);
        }
    }

    public function update(&$usuario)
    {

        $id = $usuario->getId();
        $nome = $usuario->getNome();
        $estado = $usuario->getEstado();
        $cidade = $usuario->getCidade();
        $cep = $usuario->getCep();
        $bairro = $usuario->getBairro();
        $complemento = $usuario->getComplemento();
        $numero = $usuario->getNumero();
        $rua = $usuario->getRua();
        $cartao = $usuario->getCartao();
        $email = $usuario->getEmail();
        $telefone = $usuario->getTelefone();
        $senha = $usuario->getSenha();

        $query_updateCliente = "UPDATE CLIENTE SET 
		nome='$nome', 
		telefone='$telefone',
		email='$email',
		/*senha='$senha',*/
		cartaoCredito='$cartao'
		WHERE id = $id";
        mysqli_query($this->conn, $query_updateCliente);

        $query_updateEndereco = "UPDATE ENDERECO SET 
    	rua='$rua', 
    	numero='$numero',
    	complemento='$complemento',  
    	bairro='$bairro',
    	cep='$cep',
    	cidade='$cidade',
    	estado='$estado'
    	WHERE ClienteID = $id";
        mysqli_query($this->conn, $query_updateEndereco);
    }

    public function getById($id)
    {
        if (empty($id))
            return null;

        $query = "SELECT * FROM cliente WHERE id = $id";
        $find = mysqli_query($this->conn, $query);
        while ($line = mysqli_fetch_array($find)) {
            $nome = $line['nome'];
            $cartao = $line['cartaoCredito'];
            $telefone = $line['telefone'];
            $email = $line['email'];

            if (isset($id)) {
                $query_endereco = "SELECT * FROM endereco WHERE ClienteID = '$id' limit 1";
                $findEndereco = mysqli_query($this->conn, $query_endereco);

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

        return new User($id, '', $nome, $email, $telefone, $cartao, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado);
    }

    public function deletebyId($id)
    {

        $query = "DELETE FROM ENDERECO WHERE ClienteID = $id";
        mysqli_query($this->conn, $query);

        $query = "DELETE FROM CLIENTE WHERE id = $id";
        mysqli_query($this->conn, $query);
    }

    public function getAllUsers()
    {
        $users = array();   
        $query = "SELECT * FROM CLIENTE";
        $find_user = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_array($find_user)) {
            //serio PHP q tu não aceita mais q um construtor???
            $users[] = new User($row['id'], '',$row['nome'],'', $row['telefone'], $row['cartaoCredito'],'', '','','','','','');
        }

        return $users;
    }
}
