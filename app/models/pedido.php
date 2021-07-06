<?php

/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */

class Pedido
{
	//Atributos
	private $id;

	private $dataPedido;

	private $dataEntrega;

	private $situacao;

	private $ClienteID;

	private $cliente;

	private $precoTotal;

	private $items;

	public function __construct($id, $dataPedido, $dataEntrega, $situacao, $ClienteID)
	{
		$this->id = $id;
		$this->dataPedido = $dataPedido;
		$this->dataEntrega = $dataEntrega;
		$this->situacao = $situacao;
		$this->ClienteID = $ClienteID;
	}

	public function getDadosParaJSON()
	{
		$data = ['id' => $this->id, 'dataPedido' => $this->dataPedido, 'dataEntrega' => $this->dataEntrega, 'situacao' => $this->situacao, 'clienteId' => $this->ClienteID];
		return $data;
	}

	//Métodos Getters e Setters
	public function getId()
	{
		return $this->id;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function getDataPedido()
	{
		return $this->dataPedido;
	}

	public function getDataEntrega()
	{
		return $this->dataEntrega;
	}

	public function getSituacao()
	{
		return $this->situacao;
	}

	public function getClienteID()
	{
		return $this->ClienteID;
	}

	public function getCliente()
	{
		return $this->cliente;
	}

	public function getPrecoTotal()
	{
		return $this->precoTotal;
	}

	public function getItems()
	{
		return $this->items;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setNumero($numero)
	{
		$this->numero = $numero;
	}

	public function setDataPedido($dataPedido)
	{
		$this->dataPedido = $dataPedido;
	}

	public function setDataEntrega($dataEntrega)
	{
		$this->dataEntrega = $dataEntrega;
	}

	public function setSituacao($situacao)
	{
		$this->situacao = $situacao;
	}

	public function setClienteID($ClienteID)
	{
		$this->ClienteID = $ClienteID;
	}

	public function setCliente($Cliente)
	{
		$this->cliente = $Cliente;
	}

	public function setPrecoTotal($preco)
	{
		$this->precoTotal = $preco;
	}

	public function setItems($items)
	{
		$this->items = $items;
	}
}
