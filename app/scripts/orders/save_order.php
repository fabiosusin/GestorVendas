<?php

include '../../DAO/mySqlDao.php';
include '../../DAO/pedidoDAO.php';
include '../../models/pedido.php';

$orderDAO = new PedidoDAO();

$id = $_POST['id'];
$status = $_POST['status'];
$daliveryDate = $_POST['daliveryDate'];

echo $_POST['id'];
echo $_POST['status'];
echo $_POST['daliveryDate'];

$order = $orderDAO->carregar($id);
$order->setDataEntrega($daliveryDate);
$order->setSituacao($status);
$orderDAO->atualizar($order);

header('location:../../pages/orders/orders.php');