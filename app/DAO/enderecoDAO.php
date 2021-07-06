<?php




class EnderecoDAO
{

	public function __construct()
	{
		$dao = new MySqlDAO();
		$this->conn = $dao->getConnection();
	}

	//Carrega um elemento pela chave primária
	public function carregarIdFornecedor($id)
	{

		$sql = 'SELECT * FROM endereco WHERE FornecedorID = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id", $id);
		$consulta->execute();
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $address = new Endereco($row['id'], $row['rua'], $row['numero'], $row['complemento'], $row['bairro'], $row['cep'], $row['cidade'], $row['estado'], $row['ClienteID'], $row['FornecedorID']);
        }
        return $address;
	}

	//Lista todos os elementos da tabela
	public function listarTodos()
	{

		$sql = 'SELECT * FROM endereco';
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna)
	{

		$sql = 'SELECT * FROM endereco ORDER BY ' . $coluna;
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Apaga um elemento da tabela
	public function deletarFornecedorId($id)
	{

		$sql = 'DELETE FROM endereco WHERE FornecedorID = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id", $id);
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Insere um elemento na tabela
	public function inserirEnderecoFornecedor($endereco)
	{

		if ($endereco->getFornecedorID() == null || $endereco->getRua() == null)
			return;

		$sql = 'INSERT INTO endereco (rua, numero, complemento, bairro, cep, cidade, estado, FornecedorID) VALUES (:rua, :numero, :complemento, :bairro, :cep, :cidade, :estado, :FornecedorID)';
		$consulta = $this->conn->prepare($sql);

		$consulta->bindValue(':rua', $endereco->getRua());

		$consulta->bindValue(':numero', $endereco->getNumero());

		$consulta->bindValue(':complemento', $endereco->getComplemento());

		$consulta->bindValue(':bairro', $endereco->getBairro());

		$consulta->bindValue(':cep', $endereco->getCep());

		$consulta->bindValue(':cidade', $endereco->getCidade());

		$consulta->bindValue(':estado', $endereco->getEstado());

		$consulta->bindValue(':FornecedorID', $endereco->getFornecedorID());
		echo $consulta->queryString;
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Atualiza um elemento na tabela
	public function atualizar($endereco)
	{

		$sql = 'UPDATE endereco SET id = :id, rua = :rua, numero = :numero, complemento = :complemento, bairro = :bairro, cep = :cep, cidade = :cidade, estado = :estado, ClienteID = :ClienteID, FornecedorID = :FornecedorID WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(':id', $endereco->getId());

		$consulta->bindValue(':rua', $endereco->getRua());

		$consulta->bindValue(':numero', $endereco->getNumero());

		$consulta->bindValue(':complemento', $endereco->getComplemento());

		$consulta->bindValue(':bairro', $endereco->getBairro());

		$consulta->bindValue(':cep', $endereco->getCep());

		$consulta->bindValue(':cidade', $endereco->getCidade());

		$consulta->bindValue(':estado', $endereco->getEstado());

		$consulta->bindValue(':ClienteID', $endereco->getClienteID());

		$consulta->bindValue(':FornecedorID', $endereco->getFornecedorID());
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela()
	{

		$sql = 'DELETE FROM endereco';
		$consulta = $this->conn->prepare($sql);
		if ($consulta->execute())
			return true;
		else
			return false;
	}
}
