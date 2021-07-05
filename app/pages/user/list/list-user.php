<?php

$page_title = 'Clientes';
$page_css_links = ['user/list/list-user.css'];

include '../../../scripts/user/list/select_user.php';
include_once("../../base/header.php");

?>
<div class="list-page">
    <div class="bg-btn">
        <a class="btn btn-success" href="../register/register-user.php">NOVO</a>
    </div>
    <table class="table table-hover table-striped" id="provider">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Cartão</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (!empty($users)) {
                foreach ($users as $user) {
                    echo '<tr><td >' . $user->getNome() . '</td>';
                    echo '<td>' . $user->getTelefone() . '</td>';
                    echo '<td>' . $user->getCartao() . '</td>';
            ?>
                    <td>
                        <a href="../register/register-user.php?id=<?php echo $user->getId(); ?>">
                            <span class="edit">
                                <i class="fas fa-pencil-alt"></i>
                            </span>
                        </a>
                    </td>
                    <td>
                        <a href="../../../scripts/user/delete/delete_user.php?id=<?php echo $user->getId(); ?>">
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
