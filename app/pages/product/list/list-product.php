<?php

$page_title = 'Produtos';
$page_css_links = ['product/list/list-product.css'];

include '../../../scripts/product/list/select_product.php';
include_once("../../base/header.php");

?>
<div class="list-page">
    <div class="bg-btn">
        <a class="btn btn-success" href="../register/register-product.php">NOVO</a>
    </div>
    <table class="table table-hover table-striped" id="products">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Código Fornecedor</th>
                <th>Descricao</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (isset($products)) {
                foreach ($products as $product) {
                    echo '<tr><td >' . $product->getNome() . '</td>';
                    echo '<td>' . $product->getFornecedorID() . '</td>';
                    echo '<td>' . $product->getDescricao() . '</td>';
            ?>
                    <td>
                        <a href="../register/register-product.php?id=<?php echo $product->getId(); ?>">
                            <span class="edit">
                                <i class="fas fa-pencil-alt"></i>
                            </span>
                        </a>
                    </td>
                    <td>
                        <a href="../../../scripts/product/delete/delete_product.php?id=<?php echo $product->getId(); ?>">
                            <span style="color: Tomato;">
                                <i class="fas fa-trash-alt"></i>
                            </span>
                        </a>
                    </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include_once("../../base/footer.php");
