<?php
$admin = $_SESSION['admin'] ?? false;
$page_title = 'Compras Realizadas,';
$page_css_links = ['/orders/orders.css'];
$page_scripts_links = ['/orders/orders.js'];
include_once("../base/header.php");
?>

<main>
  <div class="page" name="orders">
    <h1>Compras Realizadas</h1>
    <?php
    if ($admin)
      echo '<div class="filters">
      <input class="default-input" placeholder="Cliente" name="client" />
      <input class="default-input" placeholder="Código da Venda" name="sale-code" />
      <button class="default-button" name="filter">Filtar</button>
    </div>';
    ?>
    <div class="orders" name="orders">
    </div>
    <div class="paginator">
      <div class="page-size">
        <span class="info">Resultados por Página:</span>
        <select class="size" name="page-size">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="15">15</option>
          <option value="25">25</option>
        </select>
      </div>
      <a class="icon" name="decrement"><i class="fas fa-angle-left"></i></a>
      <input class="default-input" value="1" name="page-number" />
      <a class="icon" name="increment"><i class="fas fa-angle-right"></i></a>
    </div>
  </div>
</main>

<?php
include_once("../base/footer.php");
