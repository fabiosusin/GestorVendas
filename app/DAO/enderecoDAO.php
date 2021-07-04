<?php

	

	   
class EnderecoDAO{

	public function __construct()
    {
        $dao = new MySqlDAO();
        $this->conn = $dao->getConnection();
    }

	//Carrega um elemento pela chave primária
	public function carregarIdFornecedor($id){
		
		$sql = 'SELECT * FROM endereco WHERE FornecedorID = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id",$id);
		$consulta->execute();
		$array = $consulta->fetchAll(PDO::FETCH_ASSOC);
		if (empty($array))
			return null;

		return array_values($array)[0];
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		
		$sql = 'SELECT * FROM endereco';
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		
		$sql = 'SELECT * FROM endereco ORDER BY '.$coluna;
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletarFornecedorId($id){
		
		$sql = 'DELETE FROM endereco WHERE FornecedorID = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id",$id);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($endereco){
		
		$sql = 'INSERT INTO endereco (id, rua, numero, complemento, bairro, cep, cidade, estado, ClienteID, FornecedorID) VALUES (:id, :rua, :numero, :complemento, :bairro, :cep, :cidade, :estado, :ClienteID, :FornecedorID)';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(':id',$endereco->getId()); 

		$consulta->bindValue(':rua',$endereco->getRua()); 

		$consulta->bindValue(':numero',$endereco->getNumero()); 

		$consulta->bindValue(':complemento',$endereco->getComplemento()); 

		$consulta->bindValue(':bairro',$endereco->getBairro()); 

		$consulta->bindValue(':cep',$endereco->getCep()); 

		$consulta->bindValue(':cidade',$endereco->getCidade()); 

		$consulta->bindValue(':estado',$endereco->getEstado()); 

		$consulta->bindValue(':ClienteID',$endereco->getClienteID()); 

		$consulta->bindValue(':FornecedorID',$endereco->getFornecedorID()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($endereco){
		include("conexao.php");
		$sql = 'UPDATE endereco SET id = :id, rua = :rua, numero = :numero, complemento = :complemento, bairro = :bairro, cep = :cep, cidade = :cidade, estado = :estado, ClienteID = :ClienteID, FornecedorID = :FornecedorID WHERE id = :id';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':id',$endereco->getId()); 

		$consulta->bindValue(':rua',$endereco->getRua()); 

		$consulta->bindValue(':numero',$endereco->getNumero()); 

		$consulta->bindValue(':complemento',$endereco->getComplemento()); 

		$consulta->bindValue(':bairro',$endereco->getBairro()); 

		$consulta->bindValue(':cep',$endereco->getCep()); 

		$consulta->bindValue(':cidade',$endereco->getCidade()); 

		$consulta->bindValue(':estado',$endereco->getEstado()); 

		$consulta->bindValue(':ClienteID',$endereco->getClienteID()); 

		$consulta->bindValue(':FornecedorID',$endereco->getFornecedorID()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("conexao.php");
		$sql = 'DELETE FROM endereco';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>