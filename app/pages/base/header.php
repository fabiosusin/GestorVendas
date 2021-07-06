<?php

session_start();
$user = $_SESSION['usuario'] ?? '';
$admin = $_SESSION['admin'] ?? false;
$logged = $_SESSION['logged'] ?? false;
$userName = $_SESSION['nomeUsuario'] ?? '';

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
        <div class="buttons w-120">
            <?php
            if (!$logged)
                echo '<a href="/GestorVendas/app/pages/login/login.php"><i class="fas fa-user"></i></a>';
            else if ($logged && !$admin)
                echo '
                <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-align-justify"></i>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item"> <span>Bem Vindo ' . $userName . '</span></a>
                    <a class="dropdown-item" href="/GestorVendas/app/pages/orders/orders.php"><span>Minhas Vendas</span></a>
                    <a class="dropdown-item" href="../../scripts/logout/logout.php"> <span>Sair</span></a>
                </div>
                <a href="/GestorVendas/app/pages/cart/cart.php"><i class="fas fa-shopping-bag"></i></a>
                ';
            else {
                echo '<div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-align-justify"></i>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/GestorVendas/app/pages/orders/orders.php"><span>Vendas</span></a>
                    <a class="dropdown-item" href="/GestorVendas/app/pages/user/list/list-user.php"><span> Usuários</span></a>
                    <a class="dropdown-item" href="/GestorVendas/app/pages/provider/list/list-provider.php"> <span>Fornecedores</span></a>
                    <a class="dropdown-item" href="/GestorVendas/app/pages/product/list/list-product.php"> <span>Produtos</span></a>
                    <a class="dropdown-item" href="/GestorVendas/app/pages/stock/list/list-stock.php"> <span>Estoque</span></a>
                    <a class="dropdown-item" href="../../scripts/logout/logout.php"> <span>Sair</span></a>
                </div>
            </div>';
            }
            ?>
        </div>

    </header>