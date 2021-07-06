<?php

/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */

class Itempedido
{
	//Atributos
	private $id;

	private $quantidade;

	private $preco;

	private $PedidoID;

	private $ProdutoID;

	private $nome;

	private $fotoUrl;

	private $descricao;

	public function __construct($id, $quantidade, $preco, $ProdutoID, $PedidoID, $nome, $fotoUrl, $descricao)
	{
		$this->id = $id;
		$this->quantidade = $quantidade;
		$this->preco = $preco;
		$this->ProdutoID = $ProdutoID;
		$this->PedidoID = $PedidoID;
		$this->nome = $nome;
		$this->fotoUrl = $fotoUrl;
		$this->descricao = $descricao;
	}

	//Métodos Getters e Setters
	public function getId()
	{
		return $this->id;
	}

	public function getQuantidade()
	{
		return $this->quantidade;
	}

	public function getPreco()
	{
		return $this->preco;
	}

	public function getPedidoID()
	{
		return $this->PedidoID;
	}

	public function getProdutoID()
	{
		return $this->ProdutoID;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function getFotoUrl()
	{
		return $this->fotoUrl;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setQuantidade($quantidade)
	{
		$this->quantidade = $quantidade;
	}

	public function setPreco($preco)
	{
		$this->preco = $preco;
	}

	public function setPedidoID($PedidoID)
	{
		$this->PedidoID = $PedidoID;
	}

	public function setProdutoID($ProdutoID)
	{
		$this->ProdutoID = $ProdutoID;
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
}
