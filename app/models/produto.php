<?php

/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */

class Produto
{
	//Atributos
	private $id;

	private $nome;

	private $descricao;

	private $foto;

	private $FornecedorID;

	public function __construct($id, $nome, $descricao, $foto, $FornecedorID)
	{
		$this->id = $id;
		$this->nome = $nome;
		$this->descricao = $descricao;
		$this->foto = $foto;
		$this->FornecedorID = $FornecedorID;
	}

	//Métodos Getters e Setters
	public function getId()
	{
		return $this->id;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function getFoto()
	{
		return $this->foto;
	}

	public function getFornecedorID()
	{
		return $this->FornecedorID;
	}


	public function setId($id)
	{
		$this->id = $id;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}

	public function setFoto($foto)
	{
		$this->foto = $foto;
	}

	public function setFornecedorID($FornecedorID)
	{
		$this->FornecedorID = $FornecedorID;
	}
}
