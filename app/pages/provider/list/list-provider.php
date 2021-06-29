<?php

$page_title = 'Fornecedores';
$page_css_links = ['provider/list/list-provider.css'];

include '../../../scripts/provider/list/select_provider.php';
include_once("../../base/header.php");

?>

<a class="btn btn-success" href="../register/register-provider.php">Inserir novo fornecedor</a>

<table class="table table-hover table-striped" id="provider">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descricao</th>
            <th>Fornecedor</th>
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
                <a href="../register/register-provider.php?id=<?php echo $linha['id']; ?>">
                    <span style="color: green;">
                        <i class="fas fa-pencil-alt"></i>
                    </span>
                </a>
            </td>
            <td>
                <a href="../../../scripts/provider/delete/delete_provider.php?id=<?php echo $linha['id']; ?>">
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
