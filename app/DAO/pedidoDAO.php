<?php

	

	   
class PedidoDAO{

	//Carrega um elemento pela chave primária
	public function carregar($id){
		
		$sql = 'SELECT * FROM pedido WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id",$id);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		
		$sql = 'SELECT * FROM pedido';
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		
		$sql = 'SELECT * FROM pedido ORDER BY '.$coluna;
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($id){
		
		$sql = 'DELETE FROM pedido WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id",$id);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($pedido){
		
		$sql = 'INSERT INTO pedido (id, numero, dataPedido, dataEntrega, situacao, ClienteID, ProdutoID) VALUES (:id, :numero, :dataPedido, :dataEntrega, :situacao, :ClienteID, :ProdutoID)';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(':id',$pedido->getId()); 

		$consulta->bindValue(':numero',$pedido->getNumero()); 

		$consulta->bindValue(':dataPedido',$pedido->getDataPedido()); 

		$consulta->bindValue(':dataEntrega',$pedido->getDataEntrega()); 

		$consulta->bindValue(':situacao',$pedido->getSituacao()); 

		$consulta->bindValue(':ClienteID',$pedido->getClienteID()); 

		$consulta->bindValue(':ProdutoID',$pedido->getProdutoID()); 
		if($consulta->execute())
			return true;
		elseconn
			return false;
	}conn
	
	//Atualiza um elemento na tabela
	public function atualizar($pedido){
		include("conexao.php");
		$sql = 'UPDATE pedido SET id = :id, numero = :numero, dataPedido = :dataPedido, dataEntrega = :dataEntrega, situacao = :situacao, ClienteID = :ClienteID, ProdutoID = :ProdutoID WHERE id = :id';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':id',$pedido->getId()); 

		$consulta->bindValue(':numero',$pedido->getNumero()); 

		$consulta->bindValue(':dataPedido',$pedido->getDataPedido()); 

		$consulta->bindValue(':dataEntrega',$pedido->getDataEntrega()); 

		$consulta->bindValue(':situacao',$pedido->getSituacao()); 
conn
		$consulta->bindValue(':ClienteID',$pedido->getClienteID()); 
conn
		$consulta->bindValue(':ProdutoID',$pedido->getProdutoID()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("conexao.php");
		$sql = 'DELETE FROM pedido';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>