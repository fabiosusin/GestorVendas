<?php
include '../../DAO/mySqlDao.php';
include '../../DAO/estoqueDAO.php';
include '../../DAO/itempedidoDAO.php';
include '../../DAO/pedidoDAO.php';
include '../../models/itempedido.php';
include '../../models/pedido.php';

$stockDAO = new EstoqueDAO();
$orderDAO = new PedidoDAO();
$orderItemDAO = new ItempedidoDAO();
session_start();

$data = json_decode($_POST['data']);

$id = $orderDAO->inserir(new Pedido('', date('Y-m-d'), null, 'Aguardando Pagamento', $_SESSION['usuarioId']));
foreach ($data as $item) {
    $orderItemDAO->inserir(new Itempedido('', $item->quantity, $item->price, $item->id, $id, '', '', ''));
}
$stockDAO->movimentarEstoque($data);
