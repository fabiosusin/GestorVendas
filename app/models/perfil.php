<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Perfil{
		//Atributos
		private $id;
 		private $nome;
 				
		//Métodos Getters e Setters
		public function getId(){
			return $this->id;
		}
		public function getNome(){
			return $this->nome;
		}
		
		public function setId($id){
			$this->id=$id;
		}
		public function setNome($nome){
			$this->nome=$nome;
		}
		
	}
?>