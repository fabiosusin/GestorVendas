<?php

$page_title = 'Home';
$page_css_links = ['/home/site.css'];
include_once("../base/header.php");

// session_start();
// if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
//   unset($_SESSION['login']);
//   unset($_SESSION['senha']);
//   header('location:login.php');
// }

$logado = $_SESSION['login'];
?>

<main>
  <div class="page">
    <div class="images">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="item active">
            <img src="https://offerszing.com/wp-content/uploads/2021/03/training-sales-team-investment-open-graph.png" alt="First slide" style="width:100%;">
          </div>

          <div class="item">
            <img src="https://www.smarthint.co/wp-content/uploads/2019/03/futuro-do-ecommerce.jpg" alt="Chicago" style="width:100%;">
          </div>

          <div class="item">
            <img src="https://neilpatel.com/wp-content/uploads/2019/10/mini-caixas-de-compras-sob-teclado-de-laptop-1.jpeg" alt="First slide" style="width:100%;">
          </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="title">
      <p>Seja Bem Vindo
        </br>
        Aqui no <strong>NEST</strong> você acha tudo o que você procura!
      </p>
    </div>
    <div class="products">
      <div class="item">
        <div class="photo">
          <img src="../../shared/upload/trab.png" alt="Imagem">
        </div>
        <div class="description">
          <span><strong>Meu Produto</strong> por <strong>R$ 20,00</strong></span>
        </div>
      </div>
      <div class="item">
        <div class="photo">
          <img src="../../shared/upload/trab.png" alt="Imagem">
        </div>
        <div class="description">
          <span><strong>Meu Produto</strong> por <strong>R$ 20,00</strong></span>
        </div>
      </div>
      <div class="item">
        <div class="photo">
          <img src="../../shared/upload/trab.png" alt="Imagem">
        </div>
        <div class="description">
          <span><strong>Meu Produto</strong> por <strong>R$ 20,00</strong></span>
        </div>
      </div>
      <div class="item">
        <div class="photo">
          <img src="../../shared/upload/trab.png" alt="Imagem">
        </div>
        <div class="description">
          <span><strong>Meu Produto</strong> por <strong>R$ 20,00</strong></span>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include_once("../base/footer.php");
