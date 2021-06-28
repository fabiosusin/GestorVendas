<?php

$page_title = 'Compras Realizadas,';
$page_css_links = ['/orders/orders.css'];
include_once("../base/header.php");
?>

<main>
  <div class="page">
    <h1>Compras Realizadas</h1>
    <!-- data, data entrega, cliente, nro, valor total -->
    <div class="orders">
      <div class="order">
        <div class="header-info">
          <div class="info">
            <span class="title">Código</span>
            <span class="info">1</span>
          </div>
          <div class="info">
            <span class="title">Data da Compra</span>
            <span class="info">07/08/2020</span>
          </div>
          <div class="info">
            <span class="title">Data da Entrega</span>
            <span class="info">21/05/2021</span>
          </div>
          <div class="info">
            <span class="title">Cliente</span>
            <span class="info">Fabio Susin</span>
          </div>
          <div class="info">
            <span class="title">Valor total</span>
            <span class="info">R$ 50,00</span>
          </div>
        </div>
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
      </div>
      <div class="order">
        <div class="header-info">
          <div class="info">
            <span class="title">Código</span>
            <span class="info">1</span>
          </div>
          <div class="info">
            <span class="title">Data da Compra</span>
            <span class="info">07/08/2020</span>
          </div>
          <div class="info">
            <span class="title">Data da Entrega</span>
            <span class="info">21/05/2021</span>
          </div>
          <div class="info">
            <span class="title">Cliente</span>
            <span class="info">Fabio Susin</span>
          </div>
          <div class="info">
            <span class="title">Valor total</span>
            <span class="info">R$ 50,00</span>
          </div>
        </div>
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
      </div>
    </div>
    <div class="paginator">
      <div class="page-size">
        <span class="info">Resultados por Página:</span>
        <select class="size">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="15">15</option>
          <option value="25">25</option>
        </select>
      </div>
      <a class="icon"><i class="fas fa-angle-double-left"></i></a>
      <a class="icon"><i class="fas fa-angle-left"></i></a>
      <input class="default-input" value="1" />
      <a class="icon"><i class="fas fa-angle-right"></i></a>
      <a class="icon"><i class="fas fa-angle-double-right"></i></a>
    </div>
  </div>
</main>

<?php
include_once("../base/footer.php");
