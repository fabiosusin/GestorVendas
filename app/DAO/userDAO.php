<?php



class UserDAO
{

    public function __construct()
    {
        $dao = new MySqlDAO();
        $this->conn = $dao->getConnection();
    }

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

        $query_cliente = "INSERT INTO cliente(nome, telefone, email, cartaoCredito, senha) 
        VALUES (:nome,:telefone,:email,:cartao, :senha)";

        $stmt = $this->conn->prepare($query_cliente);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(':cartao', $cartao);

        $stmt->execute();

        $stmt = $this->conn->prepare("SELECT * FROM cliente WHERE nome = :nome and senha = :senha limit 1");
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $last_id = $row['id'];

        $query_endereco = "INSERT INTO ENDERECO(rua, numero, complemento, bairro, cep, cidade, estado, clienteID) 
            VALUES(:rua, :numero, :complemento, :bairro, :cep, :cidade, :estado, :id)";

        $stmt = $this->conn->prepare($query_endereco);

        $stmt->bindParam(":estado", $estado);
        $stmt->bindParam(":cidade", $cidade);
        $stmt->bindParam(":cep", $cep);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':id', $last_id);

        $stmt->execute();
    }

    public function update(&$usuario)
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
        $id = $usuario->getId();

        $query_updateCliente = "UPDATE CLIENTE SET 
		nome=:nome, 
		telefone=:telefone,
		email=:email,
		senha=:senha,
		cartaoCredito=:cartao
		WHERE id = :id";

        $stmt = $this->conn->prepare($query_updateCliente);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':cartao', $cartao);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $query_updateEndereco = "UPDATE ENDERECO SET 
    	rua=:rua, 
    	numero=:numero,
    	complemento=:complemento,  
    	bairro=:bairro,
    	cep=:cep,
    	cidade=:cidade,
    	estado=:estado
    	WHERE ClienteID = :id";

        $stmt = $this->conn->prepare($query_updateEndereco);

        $stmt->bindParam(":estado", $estado);
        $stmt->bindParam(":cidade", $cidade);
        $stmt->bindParam(":cep", $cep);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    public function getById($id)
    {
        if (empty($id))
            return null;

        $query = "SELECT * FROM cliente WHERE id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome = $row['nome'];
        $cartao = $row['cartaoCredito'];
        $telefone = $row['telefone'];
        $email = $row['email'];
        $senha = $row['senha'];
        $rua = '';
        $numero = '';
        $complemento = '';
        $bairro = '';
        $cep = '';
        $cidade = '';
        $estado = '';
        if (isset($id)) {
            $query_endereco = "SELECT * FROM endereco WHERE ClienteID = '$id' limit 1";
            $stmt = $this->conn->prepare($query_endereco);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $rua = $row["rua"];
                $numero = $row['numero'];
                $complemento = $row['complemento'];
                $bairro = $row['bairro'];
                $cep = $row['cep'];
                $cidade = $row['cidade'];
                $estado = $row['estado'];
            }
        }

        return new User($id, $senha, $nome, $email, $telefone, $cartao, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado);
    }

    public function getByName($nome)
    {
        if (empty($nome))
            return null;

        $query = "SELECT * FROM cliente WHERE nome = :nome";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row == null)
            return;
        $nome = $row['nome'];
        $cartao = $row['cartaoCredito'];
        $telefone = $row['telefone'];
        $email = $row['email'];
        $senha = $row['senha'];
        $rua = '';
        $numero = '';
        $complemento = '';
        $bairro = '';
        $cep = '';
        $cidade = '';
        $estado = '';

        return new User($row['id'], $senha, $nome, $email, $telefone, $cartao, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado);
    }

    public function getByUserAndPassword($user, $pass)
    {

        $query = "SELECT * FROM cliente WHERE email = :user and senha = :pass";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!isset($row) || empty($row))
            return;
        $nome = $row['nome'];
        $cartao = $row['cartaoCredito'];
        $telefone = $row['telefone'];
        $email = $row['email'];
        $senha = $row['senha'];
        $id = $row['id'];
        $rua = '';
        $numero = '';
        $complemento = '';
        $bairro = '';
        $cep = '';
        $cidade = '';
        $estado = '';

        if (isset($id)) {
            $query_endereco = "SELECT * FROM endereco WHERE ClienteID = '$id' limit 1";
            $stmt = $this->conn->prepare($query_endereco);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $rua = $row["rua"];
                $numero = $row['numero'];
                $complemento = $row['complemento'];
                $bairro = $row['bairro'];
                $cep = $row['cep'];
                $cidade = $row['cidade'];
                $estado = $row['estado'];
            }
        }

        return new User($id, $senha, $nome, $email, $telefone, $cartao, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado);
    }

    public function deletebyId($id)
    {

        $query = "DELETE FROM ENDERECO WHERE ClienteID = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $query = "DELETE FROM CLIENTE WHERE id = $id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getAllUsers()
    {
        $users = array();
        $query = "SELECT * FROM CLIENTE";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //serio PHP q tu não aceita mais q um construtor???
            $users[] = new User($row['id'], '', $row['nome'], '', $row['telefone'], $row['cartaoCredito'], '', '', '', '', '', '', '');
        }

        return $users;
    }
}
