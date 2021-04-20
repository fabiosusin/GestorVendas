<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="/www/GestorVendas/app/pages/shared/css/variables.css">
  <link rel="stylesheet" href="/www/GestorVendas/app/pages/shared/css/layout.css">
  <script src="https://kit.fontawesome.com/9550dd9c94.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="login-page">
    <form method="post" action="valida_login.php">
      <div style="background-image: url(/www/GestorVendas/app/assets/images/svg/icons8-shopify.svg);"></div>
      <div class="input-with-icon">
        <i class="fas fa-envelope"></i>
        <input type="text" placeholder="Email" name="usuario" />
      </div>
      <div class="input-with-icon">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Senha" name="senha"/>
      </div>
      <a>Esqueci minha senha</a>
      <button>ENTRAR</button>

      <p>Não tem conta? <a>Então Registre-se</a></p>
    </form>
  </div>
</body>
</html> 