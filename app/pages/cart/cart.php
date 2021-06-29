<?php
$page_title = 'Carrinho de Compras';
$page_css_links = ['/cart/cart.css'];
$page_scripts_links = ['/cart/cart.js'];
include_once("../base/header.php");
?>

<main>
  <div class="page" name="cart">
    <h1>Carrinho de Compras</h1>
    <div class="products" name="products">
    </div>
    <div class="actions">
      <a class="link" onclick="window.history.go(-1); return false;"><i class="far fa-arrow-alt-circle-left"></i>Voltar para a Loja</a>
      <a class="link" name="clear-cart"><i class="fas fa-trash remove"></i>Limpar o Carrinho</a>
    </div>
    <div class="footer">
      <div class="infos">
        <div class="sub-total">
          <span class="left">SubTotal</span>
          <span class="right">R$ 20,00</span>
        </div>
        <div class="sub-total">
          <span class="left">Total</span>
          <span class="right">R$ 20,00</span>
        </div>
        <button class="col-md-12 default-button">Finalizar Compra</button>
      </div>
    </div>
  </div>
</main>

<?php
include_once("../base/footer.php");
