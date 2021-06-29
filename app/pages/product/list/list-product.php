<?php

$page_title = 'Produtos';
$page_css_links = ['product/list/list-product.css'];

include '../../../scripts/product/list/select_product.php';
include_once("../../base/header.php");

?>

<a class="btn btn-success" href="../register/register-product.php">Inserir novo produto</a>

<table class="table table-hover table-striped" id="products">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descricao</th>
            <th>Fornecedor</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    </thead>
    <tbody>

        <?php
        while ($linha = mysqli_fetch_array($find_products)) {
            echo '<tr><td >' . $linha['id'] . '</td>';
            echo '<td>' . $linha['nome'] . '</td>';
            echo '<td>' . $linha['descricao'] . '</td>';
            echo '<td>' . $linha['fornecedor_nome'] . '</td>';
        ?>
            <td>
                <a href="../register/register-product.php?id=<?php echo $linha['id']; ?>">
                    <span style="color: green;">
                        <i class="fas fa-pencil-alt"></i>
                    </span>
                </a>
            </td>
            <td>
                <a href="../../../scripts/product/delete/delete_product.php?id=<?php echo $linha['id']; ?>">
                    <span style="color: Tomato;">
                        <i class="fas fa-trash-alt"></i>
                    </span>
                </a>
            </td>
            </tr>
        <?php
        }

        ?>
    </tbody>
</table>

<?php
include_once("../../base/footer.php");
