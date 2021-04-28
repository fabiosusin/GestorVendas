<?php
$page_title = 'Movimentação de Estoque';
$page_css_links = ['stock/register/register-stock.css'];

include_once("../../base/header.php");
include '../../../scripts/stock/register/get_stock.php';

?>

<div class="page-container">
    <form class="form" method="post" action="../../../scripts/stock/register/insert_stock.php">
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <div class="col-md-12 input-with-icon">
            <i class="fas fa-lock icon"></i>
            <select class="default-input" name="product" value="<?php echo $product ?>">
                <option>Selecione um produto</option>
                <?php
                while ($linha = mysqli_fetch_array($consulta_products)) {
                    echo '<option value="' . $linha['id'] . '">' . $linha['nome'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-md-12 input-with-icon">
            <i class="fas fa-arrows-alt-h icon"></i>
            <select class="default-input" id="types" name="type" id="type" placeholder="Tipo" value="<?php echo $type ?>">
                <option value="Entrada">Entrada</option>
                <option value="Saída">Saída</option>
            </select>
        </div>
        <div class="col-md-6 input-with-icon">
            <i class="fas fa-sort-numeric-up icon"></i>
            <input class="default-input" mask="number" type="text" name="quantity" value="<?php echo $quantity ?>" placeholder="Quantidade">
        </div>
        <div class="col-md-6 input-with-icon">
            <i class="fas fa-money-bill-wave icon"></i>
            <input class="default-input" mask="value" type="text" name="price" value="<?php echo $price ?>" placeholder="Preço (R$)">
        </div>
        <div class="col-md-12">
            <button type="submit" class="col-md-12 default-button">Salvar</button>
        </div>
</div>

<?php
include_once("../../base/footer.php");
?>