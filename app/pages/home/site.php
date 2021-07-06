<?php

$page_title = 'Home';
$page_css_links = ['/home/site.css'];
$page_scripts_links = ['/home/site.js'];
include_once("../base/header.php");
include_once("../../scripts/conexao/conexao.php");

$name = isset($_GET['name']) ? $_GET['name'] : '';
$where = 'where estoque.ProdutoID IS NOT NULL and quantidade > 0';
if (isset($name))
  $where .= " and produto.nome like '%$name%'";

$query = "SELECT * FROM produto LEFT JOIN estoque ON produto.id = estoque.ProdutoID $where";
$consulta_products = mysqli_query($conexao, $query);
?>

<main>
  <div class="page" name="site">
    <div class="images">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="item active">
            <img src="../../assets/images/png/imagem1.jpg" alt="First slide" style="width:100%;">
          </div>

          <div class="item">
            <img src="../../assets/images/png/imagem2.webp" alt="Chicago" style="width:100%;">
          </div>

          <div class="item">
            <img src="../../assets/images/png/imagem3.webp" alt="First slide" style="width:100%;">
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
      <?php
      if (isset($consulta_products))
        while ($linha = mysqli_fetch_array($consulta_products)) {
          $image = $linha['fotoUrl'] ? '<img src="../../' . $linha['fotoUrl'] . '" alt="Imagem">' : '';
          echo '<div class="item">
        <div class="photo">
        ' . $image . '
        </div>
        <div class="description">
          <span><strong>' . $linha['nome'] . '</strong> por <strong>R$ ' .  number_format($linha['preco'], 2, ',', '.') . '</strong></span>
        </div>
        <div class="buy">
          <input type="hidden" name="productId" value="' . $linha['ProdutoID'] . '" />
          <button class="default-button" type="button" name="add-to-cart">Adicionar ao Carrinho <i class="fas fa-shopping-bag"></i> </button>
        </div>
      </div>';
        }
      ?>

    </div>
  </div>
</main>

<?php
include_once("../base/footer.php");
