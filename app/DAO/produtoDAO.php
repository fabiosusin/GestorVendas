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
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$products = new Produto($row['id'], $row['nome'], $row['descricao'], $row['fotoUrl'], $row['FornecedorID']);
		}

		return isset($products) ? $products : null;
	}

	//Lista todos os elementos da tabela
	public function listarTodos()
	{

		$sql = 'SELECT * FROM produto';
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$products[] = new Produto($row['id'], $row['nome'], $row['descricao'], $row['fotoUrl'], $row['FornecedorID']);
		}

		return isset($products) ? $products : null;
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

		$sql = 'INSERT INTO produto (nome, descricao, fotoUrl, FornecedorID) VALUES (:nome, :descricao, :fotoUrl, :FornecedorID)';
		$consulta = $this->conn->prepare($sql);

		$consulta->bindValue(':nome', $produto->getNome());

		$consulta->bindValue(':descricao', $produto->getDescricao());

		$consulta->bindValue(':fotoUrl', $produto->getFotoUrl());

		$consulta->bindValue(':FornecedorID', $produto->getFornecedorID());
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Atualiza um elemento na tabela
	public function atualizar($produto)
	{

		$sql = 'UPDATE produto SET id = :id, nome = :nome, descricao = :descricao, fotoUrl = :fotoUrl, FornecedorID = :FornecedorID WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(':id', $produto->getId());

		$consulta->bindValue(':nome', $produto->getNome());

		$consulta->bindValue(':descricao', $produto->getDescricao());

		$consulta->bindValue(':fotoUrl', $produto->getFotoUrl());

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
