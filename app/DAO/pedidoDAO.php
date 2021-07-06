<?php
class PedidoDAO
{

	public function __construct()
	{
		$dao = new MySqlDAO();
		$this->conn = $dao->getConnection();
	}

	//Carrega um elemento pela chave primária
	public function carregar($id)
	{

		$sql = 'SELECT * FROM pedido WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id", $id);
		$consulta->execute();
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$order = new Pedido($row['id'], $row['dataPedido'], $row['dataEntrega'], $row['situacao'], $row['ClienteID']);
		}
		return $order;
	}

	//Lista todos os elementos da tabela
	public function listarTodos($limit, $skip)
	{
		$offset = '';
		if (isset($skip) && $skip > 0)
			$offset = ' OFFSET ' . $skip . '';

		$sql = 'SELECT * FROM pedido limit ' . $limit . '' . $offset . '';
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$orders[] = new Pedido($row['id'], $row['dataPedido'], $row['dataEntrega'], $row['situacao'], $row['ClienteID']);
		}

		return isset($orders) ? $orders : null;
	}

	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarVendasCliente($id, $clientId, $limit, $skip)
	{


		$offset = '';
		if (isset($skip) && $skip > 0)
			$offset = ' OFFSET ' . $skip . '';

		$where = '';
		if ($id != 0)
			$where  = 'and id = :id';

		$sql = 'SELECT * FROM pedido WHERE ClienteID = :clienteId ' . $where . ' limit ' . $limit . '' . $offset . '';
		$consulta = $this->conn->prepare($sql);

		$consulta->bindValue(':clienteId', $clientId);
		if ($id != 0)
			$consulta->bindValue(':id', $id);
		$consulta->execute();
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$orders[] = new Pedido($row['id'], $row['dataPedido'], $row['dataEntrega'], $row['situacao'], $row['ClienteID']);
		}

		return isset($orders) ? $orders : null;
	}

	//Apaga um elemento da tabela
	public function deletar($id)
	{

		$sql = 'DELETE FROM pedido WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(":id", $id);
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Insere um elemento na tabela
	public function inserir($pedido)
	{

		$sql = "INSERT INTO pedido (dataPedido, dataEntrega, situacao, ClienteID) VALUES (:dataPedido, :dataEntrega, :situacao, :ClienteID)";
		$consulta = $this->conn->prepare($sql);
		echo $pedido->getDataPedido() . ',';
		$consulta->bindValue(':dataPedido', $pedido->getDataPedido());
		echo $pedido->getDataEntrega() . ',';
		$consulta->bindValue(':dataEntrega', $pedido->getDataEntrega());
		echo $pedido->getSituacao() . ',';
		$consulta->bindValue(':situacao', $pedido->getSituacao());
		echo $pedido->getClienteID() . ',';
		$consulta->bindValue(':ClienteID', $pedido->getClienteID());
		try {
			$consulta->execute();
		} catch (Exception $e) {
			echo 'Exception -> ';
			echo $e->getMessage();
		}

		$sql = 'SELECT MAX(Id) FROM pedido';
		$consulta = $this->conn->prepare($sql);
		$consulta->execute();
		$id = '';
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$id = $row['MAX(Id)'];
		}
		return $id;
	}

	//Atualiza um elemento na tabela
	public function atualizar($pedido)
	{

		$sql = 'UPDATE pedido SET id = :id, dataPedido = :dataPedido, dataEntrega = :dataEntrega, situacao = :situacao, ClienteID = :ClienteID WHERE id = :id';
		$consulta = $this->conn->prepare($sql);
		$consulta->bindValue(':id', $pedido->getId());

		$consulta->bindValue(':dataPedido', $pedido->getDataPedido());

		$consulta->bindValue(':dataEntrega', $pedido->getDataEntrega());

		$consulta->bindValue(':situacao', $pedido->getSituacao());

		$consulta->bindValue(':ClienteID', $pedido->getClienteID());
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela()
	{

		$sql = 'DELETE FROM pedido';
		$consulta = $this->conn->prepare($sql);
		if ($consulta->execute())
			return true;
		else
			return false;
	}
}
