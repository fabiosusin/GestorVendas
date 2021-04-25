<?php
$page_title = 'Cadastro de Produto';
$page_css_links = ['register-product/register-product.css'];

include_once("../base/header.php");
?>

<div class="register-product">
  <form class="form" method="post" action="../../scripts/register-product/insert_product.php">
    <div class="photo">
      <button type="button" class="content">
        <i class="fas fa-camera"></i>
      </button>
    </div>
    <div class="col-md-12 input-with-icon">
      <i class="fas fa-lock icon"></i>
      <input class="default-input" type="text" name="nome" class="form-control" id="razao_social" placeholder="Nome">
    </div>
    <div class="col-md-12 textarea-with-icon">
      <i class="fas fa-credit-card icon"></i>
      <textarea class="default-textarea" type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição"></textarea>
    </div>
</div>

<?php
include_once("../base/footer.php");
?>