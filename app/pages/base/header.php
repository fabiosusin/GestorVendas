<?php

session_start();
$user = $_SESSION['usuario'] ?? '';
$admin = $_SESSION['admin'] ?? '';
$logged = $_SESSION['logged'] ?? false;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/GestorVendas/app/shared/css/variables/variables.css">
    <link rel="stylesheet" href="/GestorVendas/app/shared/css/layout/layout.css">
    <script type="text/javascript" src="/GestorVendas/app/lib/js/jquery/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/GestorVendas/app/lib/js/jquery/jquery.mask.min.js"></script>
    <script src="https://kit.fontawesome.com/9550dd9c94.js" crossorigin="anonymous"></script>
    <script src="/GestorVendas/app/scripts/base/nest.js"></script>
    <script type="text/javascript" src="/GestorVendas/app/lib/moment/moment.js"></script>
    <script type="text/javascript" src="/GestorVendas/app/lib/moment/locale/pt-br.js"></script>
    <script type="text/javascript" src="/GestorVendas/app/lib/js/mask/validate.js"></script>
    <?php
    if (isset($page_css_links))
        foreach ($page_css_links as $value) {
            echo '<link rel="stylesheet" href="/GestorVendas/app/pages/' . $value . '">';
        }
    if (isset($page_scripts_links))
        foreach ($page_scripts_links as $value) {
            echo '<script src="/GestorVendas/app/scripts/' . $value . '"></script>';
        }
    ?>
</head>

<body>
    <header>
        <a class="logo" href="/GestorVendas/app/pages/home/site.php">
            NEST
        </a>
        <form class="search input-with-icon">
            <i class="fas fa-search icon"></i>
            <input class="default-input" placeholder="Pesquisar Produtos" />
        </form>
        <div class="buttons <?php echo ($admin ? 'w-120' : '') ?>">
            <?php
            if ($logged && !$admin) {
                echo '<a href="/GestorVendas/app/pages/login/login.php"><i class="fas fa-user"></i></a>';
                echo '<a href="/GestorVendas/app/pages/cart/cart.php"><i class="fas fa-shopping-bag"></i></a>';
            }
            if ($admin) {
                echo '';
            }
            ?>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-align-justify"></i>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/GestorVendas/app/pages/user/list/list-user.php"><span> Usuário</span></a>
                    <a class="dropdown-item" href="/GestorVendas/app/pages/provider/list/list-provider.php"> <span>Fornecedor</span></a>
                    <a class="dropdown-item" href="/GestorVendas/app/pages/product/list/list-product.php"> <span>Produto</span></a>
                    <a class="dropdown-item" href="/GestorVendas/app/pages/stock/list/list-stock.php"> <span>Estoque</span></a>
                </div>
            </div>
        </div>

    </header>