<?php

class FornecedorDAO
{

	public function __construct()
	{
		$dao = new MySqlDAO();
		$this->conn = $dao->getConnection();
	}

	//Carrega um elemento pela chave primária
	public function carregar($id)
	{

		$sql = 'SELECT * FROM fornecedor WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id", $id);
		$consulta->execute();
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$providers = new Fornecedor($row['id'], $row['nome'], $row['descricao'], $row['telefone'], $row['email']);
		}
		return $providers;
	}

	//Lista todos os elementos da tabela
	public function listarTodos()
	{

		$sql = 'SELECT * FROM fornecedor';
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$providers[] = new Fornecedor($row['id'], $row['nome'], $row['descricao'], $row['telefone'], $row['email']);
		}

		return isset($providers) ? $providers : null;
	}

	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna)
	{

		$sql = 'SELECT * FROM fornecedor ORDER BY ' . $coluna;
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Apaga um elemento da tabela
	public function deletar($id)
	{

		$sql = 'DELETE FROM fornecedor WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id", $id);
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Insere um elemento na tabela
	public function inserir($fornecedor)
	{
		$sql = 'INSERT INTO fornecedor (nome, descricao, telefone, email) VALUES (:nome, :descricao, :telefone, :email)';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(':nome', $fornecedor->getNome());

		$consulta->bindValue(':descricao', $fornecedor->getDescricao());

		$consulta->bindValue(':telefone', $fornecedor->getTelefone());

		$consulta->bindValue(':email', $fornecedor->getEmail());

		if ($consulta->execute())
			return true;
		else
			return false;
	}

	public function GetLastId()
	{
		$sql = 'SELECT MAX(Id) FROM fornecedor';
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		$id = '';
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$id = $row['MAX(Id)'];
		}
		return $id;
	}

	//Atualiza um conno na tabela
	public function atualizar($fornecedor)
	{

		$sql = 'UPDATE fornecedor SET id = :id, nome = :nome, descricao = :descricao, telefone = :telefone, email = :email WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(':id', $fornecedor->getId());

		$consulta->bindValue(':nome', $fornecedor->getNome());

		$consulta->bindValue(':descricao', $fornecedor->getDescricao());

		$consulta->bindValue(':telefone', $fornecedor->getTelefone());

		$consulta->bindValue(':email', $fornecedor->getEmail());
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela()
	{

		$sql = 'DELETE FROM fornecedor';
		$consulta = $this->conn->prepare($sql);
		if ($consulta->execute())
			return true;
		else
			return false;
	}
}
