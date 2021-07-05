<?php
$page_title = 'Cadastro de Produto';
$page_css_links = ['product/register/register-product.css'];
$page_scripts_links = ['product/register/register-product.js'];

include_once("../../base/header.php");
include '../../../scripts/product/register/get_product.php';

?>

<div class="page-container" name="registerProduct">
  <form class="form" method="post" action="../../../scripts/product/register/insert_product.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id ?>" />
    <div class="photo">
      <button type="button" class="content" name="btn-photo">
        <div class="image" name="image-product">
          <a class="remove-picture" name="remove-picture"><i class="fas fa-times"></i></a>
        </div>
        <i class="fas fa-camera" name="icon"></i>
        <input type="file" id="picture" name="picture" />
      </button>
    </div>
    <div class="col-md-12 input-with-icon">
      <i class="fas fa-lock icon"></i>
      <input class="default-input" type="text" name="name" value="<?php echo $name ?>" placeholder="Nome">
    </div>
    <div class="col-md-12 input-with-icon">
      <i class="fas fa-lock icon"></i>
      <select class="default-input" name="providerId" value="<?php echo $providerName ?>">
        <option>Selecione um fornecedor</option>
        <?php
        if (empty($providers))
          return;
        foreach ($providers as $provider) {
          echo '<option value="' . $provider->getId() . '" ' . ($providerName == $provider->getNome() ? 'selected' : '') . '>' . $provider->getNome() . '</option>';
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