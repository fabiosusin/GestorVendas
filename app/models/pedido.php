<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Pedido{
		//Atributos
		private $id;
 		private $numero;
 		private $dataPedido;
 		private $dataEntrega;
 		private $situacao;
 		private $ClienteID;
 		private $ProdutoID;
 				
		//Métodos Getters e Setters
		public function getId(){
			return $this->id;
		}
		public function getNumero(){
			return $this->numero;
		}
		public function getDataPedido(){
			return $this->dataPedido;
		}
		public function getDataEntrega(){
			return $this->dataEntrega;
		}
		public function getSituacao(){
			return $this->situacao;
		}
		public function getClienteID(){
			return $this->ClienteID;
		}
		public function getProdutoID(){
			return $this->ProdutoID;
		}
		
		public function setId($id){
			$this->id=$id;
		}
		public function setNumero($numero){
			$this->numero=$numero;
		}
		public function setDataPedido($dataPedido){
			$this->dataPedido=$dataPedido;
		}
		public function setDataEntrega($dataEntrega){
			$this->dataEntrega=$dataEntrega;
		}
		public function setSituacao($situacao){
			$this->situacao=$situacao;
		}
		public function setClienteID($ClienteID){
			$this->ClienteID=$ClienteID;
		}
		public function setProdutoID($ProdutoID){
			$this->ProdutoID=$ProdutoID;
		}
		
	}
?>