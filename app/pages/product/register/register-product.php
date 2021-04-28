<?php
$page_title = 'Cadastro de Produto';
$page_css_links = ['product/register/register-product.css'];

include_once("../../base/header.php");
include '../../../scripts/product/register/get_product.php';

?>

<div class="page-container">
  <form class="form" method="post" action="../../../scripts/product/register/insert_product.php">
    <input type="hidden" name="id" value="<?php echo $id ?>" />
    <div class="photo">
      <button type="button" class="content">
        <i class="fas fa-camera"></i>
      </button>
    </div>
    <div class="col-md-12 input-with-icon">
      <i class="fas fa-lock icon"></i>
      <input class="default-input" type="text" name="name" value="<?php echo $name ?>" placeholder="Nome">
    </div>
    <div class="col-md-12 input-with-icon">
      <i class="fas fa-lock icon"></i>
      <select class="default-input" name="provider" value="<?php echo $provider ?>">
        <option>Selecione um fornecedor</option>
        <?php
        while ($linha = mysqli_fetch_array($consulta_providers)) {
          echo '<option value="' . $linha['id'] . '">' . $linha['nome'] . '</option>';
        }
        ?>
      </select>
    </div>
    <div class="col-md-12 textarea-with-icon">
      <i class="fas fa-credit-card icon"></i>
      <textarea class="default-textarea" type="text" name="description" placeholder="Descrição"><?php echo $description ?></textarea>
    </div>
    <div class="col-md-12">
      <button type="submit" class="col-md-12 default-button">Salvar</button>
    </div>
</div>

<?php
include_once("../../base/footer.php");
?>