<?php

	

	   
class EstoqueDAO{

	public function __construct()
    {
        $dao = new MySqlDAO();
        $this->conn = $dao->getConnection();
    }

	//Carrega um elemento pela chave primária
	public function carregar($id){
		
		$sql = 'SELECT * FROM estoque WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id",$id);
		$consulta->execute();
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$stock = new Estoque($row['id'], $row['quantidade'], $row['preco'], $row['ProdutoID']);
		}

		return isset($stock) ? $stock : null;
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		
		$sql = 'SELECT * FROM estoque';
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$stocks[] = new Estoque($row['id'], $row['quantidade'], $row['preco'], $row['ProdutoID']);
		}

		return isset($stocks) ? $stocks : null;
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		
		$sql = 'SELECT * FROM estoque ORDER BY '.$coluna;
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($id){
		
		$sql = 'DELETE FROM estoque WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id",$id);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($estoque){
		
		$sql = 'INSERT INTO estoque (quantidade, preco, ProdutoID) VALUES (:quantidade, :preco, :ProdutoID)';
		$consulta = $this->conn->prepare($sql);

		$consulta->bindValue(':quantidade',$estoque->getQuantidade()); 

		$consulta->bindValue(':preco',$estoque->getPreco()); 

		$consulta->bindValue(':ProdutoID',$estoque->getProdutoID()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($estoque){
		
		$sql = 'UPDATE estoque SET id = :id, quantidade = :quantidade, preco = :preco, ProdutoID = :ProdutoID WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(':id',$estoque->getId()); 

		$consulta->bindValue(':quantidade',$estoque->getQuantidade()); 

		$consulta->bindValue(':preco',$estoque->getPreco()); 

		$consulta->bindValue(':ProdutoID',$estoque->getProdutoID()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		
		$sql = 'DELETE FROM estoque';
		$consulta = $this->conn->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>