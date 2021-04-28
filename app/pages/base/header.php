<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="/GestorVendas/app/lib/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/GestorVendas/app/shared/css/variables/variables.css">
    <link rel="stylesheet" href="/GestorVendas/app/shared/css/layout/layout.css">
    <script type="text/javascript" src="/GestorVendas/app/lib/js/jquery/jquery-3.3.1.min.js"></script>
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
        <a class="logo" href="/GestorVendas/app/pages/login/login.php">
            LOGO
        </a>
        <div class="buttons">
            <a href="/GestorVendas/app/pages/user/register/register-user.php"><i class="fas fa-user"></i><span> Usuário</span></a>
            <a href="/GestorVendas/app/pages/provider/register/register-provider.php"><i class="fas fa-user"></i> <span>Fornecedor</span></a>
            <a href="/GestorVendas/app/pages/product/register/register-product.php"><i class="fas fa-boxes"></i> <span>Produto</span></a>
            <a href="/GestorVendas/app/pages/stock/register/register-stock.php"><i class="fas fa-boxes"></i> <span>Estoque</span></a>
        </div>

    </header>