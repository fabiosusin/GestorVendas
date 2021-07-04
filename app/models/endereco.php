<?php

/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */

class Endereco
{
	//Atributos
	private $id;

	private $rua;

	private $numero;

	private $complemento;

	private $bairro;

	private $cep;

	private $cidade;

	private $estado;

	private $ClienteID;

	private $FornecedorID;


	public function __construct($id, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado, $ClienteID, $FornecedorID)
	{
		$this->id = $id;
		$this->rua = $rua;
		$this->numero = $numero;
		$this->complemento = $complemento;
		$this->bairro = $bairro;
		$this->cep = $cep;
		$this->cidade = $cidade;
		$this->estado = $estado;
		$this->ClienteID = $ClienteID;
		$this->FornecedorID = $FornecedorID;
	}

	//Métodos Getters e Setters
	public function getId()
	{
		return $this->id;
	}

	public function getRua()
	{
		return $this->rua;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function getComplemento()
	{
		return $this->complemento;
	}

	public function getBairro()
	{
		return $this->bairro;
	}

	public function getCep()
	{
		return $this->cep;
	}

	public function getCidade()
	{
		return $this->cidade;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function getClienteID()
	{
		return $this->ClienteID;
	}

	public function getFornecedorID()
	{
		return $this->FornecedorID;
	}


	public function setId($id)
	{
		$this->id = $id;
	}

	public function setRua($rua)
	{
		$this->rua = $rua;
	}

	public function setNumero($numero)
	{
		$this->numero = $numero;
	}

	public function setComplemento($complemento)
	{
		$this->complemento = $complemento;
	}

	public function setBairro($bairro)
	{
		$this->bairro = $bairro;
	}

	public function setCep($cep)
	{
		$this->cep = $cep;
	}

	public function setCidade($cidade)
	{
		$this->cidade = $cidade;
	}

	public function setEstado($estado)
	{
		$this->estado = $estado;
	}

	public function setClienteID($ClienteID)
	{
		$this->ClienteID = $ClienteID;
	}

	public function setFornecedorID($FornecedorID)
	{
		$this->FornecedorID = $FornecedorID;
	}
}
