<?php

/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */

class Produto
{
	//Atributos
	private $id;

	private $nome;

	private $descricao;

	private $fotoUrl;

	private $FornecedorID;

	private $fornecedorNome;

	public function __construct($id, $nome, $descricao, $fotoUrl, $FornecedorID, $fornecedorNome)
	{
		$this->id = $id;
		$this->nome = $nome;
		$this->descricao = $descricao;
		$this->fotoUrl = $fotoUrl;
		$this->FornecedorID = $FornecedorID;
		$this->fornecedorNome = $fornecedorNome;
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

	public function getFotoUrl()
	{
		return $this->fotoUrl;
	}

	public function getFornecedorID()
	{
		return $this->FornecedorID;
	}

	public function getFornecedor()
	{
		return $this->fornecedorNome;
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

	public function setFotoUrl($fotoUrl)
	{
		$this->fotoUrl = $fotoUrl;
	}

	public function setFornecedorID($FornecedorID)
	{
		$this->FornecedorID = $FornecedorID;
	}

	public function setFornecedor($fornecedorNome)
	{
		$this->fornecedorNome = $fornecedorNome;
	}
}
