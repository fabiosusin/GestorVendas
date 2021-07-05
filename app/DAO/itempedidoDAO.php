<?php

	

	   
class ItempedidoDAO{

	public function __construct()
    {
        $dao = new MySqlDAO();
        $this->conn = $dao->getConnection();
    }

	//Carrega um elemento pela chave primária
	public function carregar($id){
		
		$sql = 'SELECT * FROM itempedido WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id",$id);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		
		$sql = 'SELECT * FROM itempedido';
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		
		$sql = 'SELECT * FROM itempedido ORDER BY '.$coluna;
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($id){
		
		$sql = 'DELETE FROM itempedido WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id",$id);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($itempedido){
		
		$sql = 'INSERT INTO itempedido (quantidade, preco, PedidoID, ProdutoID) VALUES (:quantidade, :preco, :PedidoID, :ProdutoID)';
		$consulta = $this->conn->prepare($sql);

		$consulta->bindValue(':quantidade',$itempedido->getQuantidade()); 

		$consulta->bindValue(':preco',$itempedido->getPreco()); 

		$consulta->bindValue(':PedidoID',$itempedido->getPedidoID()); 

		$consulta->bindValue(':ProdutoID',$itempedido->getProdutoID()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}conn
	
	//Atualiza um conno na tabela
	public function atualizar($itempedido){
		
		$sql = 'UPDATE itempedido SET id = :id, quantidade = :quantidade, preco = :preco, PedidoID = :PedidoID, ProdutoID = :ProdutoID WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(':id',$itempedido->getId()); 

		$consulta->bindValue(':quantidade',$itempedido->getQuantidade()); 

		$consulta->bindValue(':preco',$itempedido->getPreco()); 

		$consulta->bindValue(':PedidoID',$itempedido->getPedidoID()); 

		$consulta->bindValue(':ProdutoID',$itempedido->getProdutoID()); 
		if($consuconnecute())
			return true;
		elseconn
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		
		$sql = 'DELETE FROM itempedido';
		$consulta = $this->conn->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>