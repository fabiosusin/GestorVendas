<?php

$page_title = 'Carrinho de Compras';
$page_css_links = ['/cart/cart.css'];
include_once("../base/header.php");
?>

<main>
  <div class="page">
    <h1>Carrinho de Compras</h1>
    <div class="products">
      <div class="product">
        <div class="item">
          <div class="photo">
            <img src="../../shared/upload/trab.png" alt="Imagem">
          </div>
          <span>Meu Produto</span>
        </div>
        <div class="item">
          <span>R$ 10,00</span>
          <div class="quantity">
            <a><i class="fas fa-minus"></i></a>
            <input class="default-input" value="2" type="tel" />
            <a><i class="fas fa-plus right"></i></a>
          </div>
        </div>
        <div class="item">
          <span>R$ 20,00</span>
          <a class="remove-product"><i class="fas fa-trash"></i></a>
        </div>
      </div>
      <div class="product">
        <div class="item">
          <div class="photo">
            <img src="../../shared/upload/trab.png" alt="Imagem">
          </div>
          <span>Meu Produto</span>
        </div>
        <div class="item">
          <span>R$ 10,00</span>
          <div class="quantity">
            <a><i class="fas fa-minus"></i></a>
            <input class="default-input" value="2" type="tel" />
            <a><i class="fas fa-plus right"></i></a>
          </div>
        </div>
        <div class="item">
          <span>R$ 20,00</span>
          <a class="remove-product"><i class="fas fa-trash"></i></a>
        </div>
      </div>
    </div>
    <div class="actions">
      <a class="link"><i class="far fa-arrow-alt-circle-left"></i>Voltar para a Loja</a>
      <a class="link"><i class="fas fa-trash remove"></i>Limpar o Carrinho</a>
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
