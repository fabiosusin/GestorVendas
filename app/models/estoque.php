<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Estoque{
		//Atributos
		private $id;

 		private $quantidade;

 		private $preco;

 		private $ProdutoID;

		 
	public function __construct($id, $quantidade, $preco, $ProdutoID)
	{
		$this->id = $id;
		$this->quantidade = $quantidade;
		$this->preco = $preco;
		$this->ProdutoID = $ProdutoID;
	}
 				
		//Métodos Getters e Setters
		public function getId(){
			return $this->id;
		}

		public function getQuantidade(){
			return $this->quantidade;
		}

		public function getPreco(){
			return $this->preco;
		}

		public function getProdutoID(){
			return $this->ProdutoID;
		}

		
		public function setId($id){
			$this->id=$id;
		}

		public function setQuantidade($quantidade){
			$this->quantidade=$quantidade;
		}

		public function setPreco($preco){
			$this->preco=$preco;
		}

		public function setProdutoID($ProdutoID){
			$this->ProdutoID=$ProdutoID;
		}

		
	}
