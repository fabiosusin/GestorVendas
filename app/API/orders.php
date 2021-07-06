<?php

// Métodos de acesso ao banco de dados 
require "../DAO/mySqlDao.php";
require "../DAO/pedidoDAO.php";
require "../DAO/userDAO.php";
require "../models/pedido.php";
require "../models/user.php";

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
   case 'GET':
      $id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
      $userName = isset($_GET["nome"]) ? $_GET["nome"] : '';

      $client = null;
      $userDao = new UserDAO();
      if ($userName != '')
         $client = $userDao->getByName($userName);

      $userId = $client == null ? null : $client->getId();
      $limit = 5;
      $skip = 0;
      $ordersDAO = new PedidoDAO();

      if ($userName == '' && $id == null)
         $orders = $ordersDAO->listarTodos($limit, $skip);
      else if ($userName == '' && $id != null)
         $orders = $ordersDAO->carregarJSON($id);
      else
         $orders = $ordersDAO->listarVendasCliente($id, $userId, $limit, $skip);

      $ordersJSON = $ordersDAO->buscaPedidosJSON($orders);
      if ($ordersJSON != null) {
         echo $ordersJSON;
         http_response_code(200); // 200 OK
      } else {
         http_response_code(404); // 404 Not Found
      }
      break;
   default:
      // Invalid Request Method
      http_response_code(405); // 405 Method Not Allowed
      break;
}
