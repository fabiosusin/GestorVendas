<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Itempedido{
		//Atributos
		private $id;
 		private $quantidade;
 		private $preco;
 		private $PedidoID;
 		private $ProdutoID;
 				
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
		public function getPedidoID(){
			return $this->PedidoID;
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
		public function setPedidoID($PedidoID){
			$this->PedidoID=$PedidoID;
		}
		public function setProdutoID($ProdutoID){
			$this->ProdutoID=$ProdutoID;
		}
		
	}
?>