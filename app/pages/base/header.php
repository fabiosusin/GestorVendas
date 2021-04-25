<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="/GestorVendas/app/pages/base/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/GestorVendas/app/pages/base/css/variables/variables.css">
    <link rel="stylesheet" href="/GestorVendas/app/pages/base/css/layout/layout.css">
    <script type="text/javascript" src="/GestorVendas/app/pages/base/js/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/GestorVendas/app/pages/base/js/jquery/jquery.mask.min.js"></script>
    <script type="text/javascript" src="/GestorVendas/app/pages/base/js/mask/validate.js"></script>
    <script src="https://kit.fontawesome.com/9550dd9c94.js" crossorigin="anonymous"></script>
    <script src="/GestorVendas/app/scripts/base/nest.js"></script>
    <script type="text/javascript" src="/GestorVendas/app/lib/moment/moment.js"></script>
    <script type="text/javascript" src="/GestorVendas/app/lib/moment/locale/pt-br.js"></script>
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