<?php



class ProdutoDAO
{

	public function __construct()
	{
		$dao = new MySqlDAO();
		$this->conn = $dao->getConnection();
	}

	//Carrega um elemento pela chave primária
	public function carregar($id)
	{

		$sql = 'SELECT * FROM produto WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id", $id);
		$consulta->execute();
		$array = $consulta->fetchAll(PDO::FETCH_ASSOC);
		if (empty($array))
			return null;

		return array_values($array)[0];
	}

	//Lista todos os elementos da tabela
	public function listarTodos()
	{

		$sql = 'SELECT * FROM produto';
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna)
	{

		$sql = 'SELECT * FROM produto ORDER BY ' . $coluna;
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Apaga um elemento da tabela
	public function deletar($id)
	{

		$sql = 'DELETE FROM produto WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id", $id);
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Insere um elemento na tabela
	public function inserir($produto)
	{

		$sql = 'INSERT INTO produto (id, nome, descricao, foto, FornecedorID) VALUES (:id, :nome, :descricao, :foto, :FornecedorID)';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(':id', $produto->getId());

		$consulta->bindValue(':nome', $produto->getNome());

		$consulta->bindValue(':descricao', $produto->getDescricao());

		$consulta->bindValue(':foto', $produto->getFoto());

		$consulta->bindValue(':FornecedorID', $produto->getFornecedorID());
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Atualiza um elemento na tabela
	public function atualizar($produto)
	{

		$sql = 'UPDATE produto SET id = :id, nome = :nome, descricao = :descricao, foto = :foto, FornecedorID = :FornecedorID WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(':id', $produto->getId());

		$consulta->bindValue(':nome', $produto->getNome());

		$consulta->bindValue(':descricao', $produto->getDescricao());

		$consulta->bindValue(':foto', $produto->getFoto());

		$consulta->bindValue(':FornecedorID', $produto->getFornecedorID());
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela()
	{

		$sql = 'DELETE FROM produto';
		$consulta = $this->conn->prepare($sql);
		if ($consulta->execute())
			return true;
		else
			return false;
	}
}
