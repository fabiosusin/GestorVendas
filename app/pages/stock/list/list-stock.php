<?php

$page_title = 'Movimentações';
$page_css_links = ['stock/list/list-stock.css'];

include '../../../scripts/stock/list/select_stock.php';
include_once("../../base/header.php");

?>

<a class="btn btn-success" href="../register/register-stock.php">Inserir nova movimentação</a>

<table class="table table-hover table-striped" id="provider">
    <thead>
        <tr>
            <th>Código do produto</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    </thead>
    <tbody>

        <?php
        if (isset($stocks)) {
            foreach ($stocks as $stock) {
                echo '<tr><td >' . $stock->getProdutoID() . '</td>';
                echo '<td>' . $stock->getQuantidade() . '</td>';
                echo '<td>' . "R$ " . $stock->getPreco() . ",00" . '</td>';
        ?>
                <td>
                    <a href="../register/register-stock.php?id=<?php echo $stock->getId(); ?>">
                        <span style="color: green;">
                            <i class="fas fa-pencil-alt"></i>
                        </span>
                    </a>
                </td>
                <td>
                    <a href="../../../scripts/stock/delete/delete_stock.php?id=<?php echo $stock->getId(); ?>">
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

<?php
include_once("../../base/footer.php");
