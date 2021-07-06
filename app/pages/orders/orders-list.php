<?php
include '../../DAO/mySqlDao.php';
include '../../models/pedido.php';
include '../../models/itempedido.php';
include '../../models/user.php';
include '../../DAO/pedidoDAO.php';
include '../../DAO/itempedidoDAO.php';
include '../../DAO/userDAO.php';

$userDao = new UserDAO();
session_start();

$data = json_decode($_POST['data']);
$userId = $_SESSION['usuarioId'] ?? '';
$userName = $_SESSION['usuario'] ?? '';
$admin = $_SESSION['admin'] ?? false;
$ordersDAO = new PedidoDAO();
$orderItemsDAO = new ItempedidoDAO();

$id = 0;
$client = null;
$limit = 5;
$skip = 0;
if (isset($data)) {
  if (!empty($data->saleCode))
    $id = $data->saleCode;

  if (!empty($data->client))
    $client = $userDao->getByName($data->client);

  if (!empty($data->pageSize))
    $limit = $data->pageSize;

  if (!empty($data->pageNumber))
    $skip = ($data->pageNumber - 1) * $limit;
}

$userId = $client == null ? $userId : $client->getId();
if ($admin && $id == 0 && $client == null)
  $orders = $ordersDAO->listarTodos($limit, $skip);
else
  $orders = $ordersDAO->listarVendasCliente($id, $userId, $limit, $skip);

if (!isset($orders))
  return;

foreach ($orders as $order) {
  $order->setItems($orderItemsDAO->listarProtudosPorVendaId($order->getId()));
  if ($admin)
    $order->setCliente($userName);
  else {
    $user = $userDao->getById($order->getClienteID());
    $order->setCliente($user->getNome());
  }

  if ($order->getItems() == null)
    continue;
  foreach ($order->getItems() as $item)
    $order->setPrecoTotal($item->getQuantidade() * $item->getPreco());
}

?>

<?php
if (isset($orders)) {
  foreach ($orders as $order) {

    $products = array();
    if ($order->getItems() != null) {
      foreach ($order->getItems() as $item) {
        $image = $item->getFotoUrl() ? '<img src="../../' . $item->getFotoUrl() . '" alt="Imagem">' : '';
        $products[] = '
              <div class="product">
                <div class="item">
                  <div class="photo">
                    ' . $image . '
                  </div>
                  <span>' . $item->getNome() . '</span>
                </div>
                <div class="item">
                  <span>' . $item->getDescricao() . '</span>
                  <span>R$ ' . number_format($item->getPreco(), 2, ',', '.') . '</span>
                </div>
                <div class="item">
                  <span>' . $item->getQuantidade() . '</span>
                  <span>R$ ' . number_format($item->getQuantidade() * $item->getPreco(), 2, ',', '.') . '</span>
                </div>
              </div>';
      }
    }

    $deliveryDate = $admin ?
      '<span class="info w-date"><input name="daliveryDate" type="date" class="default-input" value="' . ($order->getDataEntrega() != '' ? $order->getDataEntrega() : '') . '" /></span>' :
      '<span class="info">' . ($order->getDataEntrega() != '' ? date_format(date_create($order->getDataEntrega()), "d/m/Y") : '') . '</span>';

    $orderStatus = $admin ?
      '<div class="info w-date">
        <select name="status">
          <option value="Aguardando Pagamento" ' . ($order->getSituacao() == 'Aguardando Pagamento' ? 'selected' : '') . '>Aguardando Pagamento</option>
          <option value="Aguardando Entrega"  ' . ($order->getSituacao() == 'Aguardando Entrega' ? 'selected' : '') . '>Aguardando Entrega</option>
          <option value="Entregue"  ' . ($order->getSituacao() == 'Entregue' ? 'selected' : '') . '>Entregue</option>
          <option value="Cancelado"  ' . ($order->getSituacao() == 'Cancelado' ? 'selected' : '') . '>Cancelado</option>
        </select>
        </div>' : '<span class="info">' . $order->getSituacao() . '</span>';

    echo '
    <form class="order" method="post" action="../../scripts/orders/save_order.php">
          <input type="hidden" name="id" value="' . $order->getId() . '"/>
          <div class="save"><button class="default-button" name="filter">Salvar</button></div>
          <div class="header-info">
            <div class="info">
              <span class="title">Código</span>
              <span class="info">' . $order->getId() . '</span>
            </div>
            <div class="info">
              <span class="title">Data da Compra</span>
              <span class="info">' . date_format(date_create($order->getDataPedido()), "d/m/Y")  . '</span>
            </div>
            <div class="info">
              <span class="title">Data da Entrega</span>
              ' . $deliveryDate . '
            </div>
            <div class="info">
              <span class="title">Status</span>
              ' . $orderStatus . '
            </div>
            <div class="info">
              <span class="title">Cliente</span>
              <span class="info">' . $order->getCliente() . '</span>
            </div>
            <div class="info">
              <span class="title">Valor total</span>
              <span class="info">R$ ' . number_format($order->getPrecoTotal(), 2, ',', '.') . '</span>
            </div>
          </div>
          <div class="products">
          ' . implode('', $products) . '
          </div>
      </form>';
  }
}
?>