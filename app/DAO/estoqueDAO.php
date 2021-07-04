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
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		
		$sql = 'SELECT * FROM estoque';
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
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
		
		$sql = 'INSERT INTO estoque (id, quantidade, preco, ProdutoID) VALUES (:id, :quantidade, :preco, :ProdutoID)';
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
	conn
	//Atualiza um elemento na tabela
	public functioconnizar($estoque){
		include("conexao.php");
		$sql = 'UPDATE estoque SET id = :id, quantidade = :quantidade, preco = :preco, ProdutoID = :ProdutoID WHERE id = :id';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':id',$estoque->getId()); 

		$consulta->bindValue(':quantidade',$estoque->getQuantidade()); 

		$consulta->bindValue(':preco',$estoque->getPreco()); 

		$consulta->bindValue(':ProdutoID',$estoque->getProdutoID()); 
		if($consulta->execute())
			return true;
		elseconn
			return false;
	}conn

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("conexao.php");
		$sql = 'DELETE FROM estoque';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>