<?php
$page_title = "Login";
$page_css_links = ['/login/login.css'];

include_once("../base/header.php");
?>

<div class="login-page">
  <form class="form" method="post" action="../../scripts/login/valida_login.php">
    <div class="col-md-12 input-with-icon">
      <i class="fas fa-envelope icon"></i>
      <input class="default-input" type="text" placeholder="Email" name="usuario" />
    </div>
    <div class="col-md-12 input-with-icon">
      <i class="fas fa-lock icon"></i>
      <input class="default-input" type="password" placeholder="Senha" name="senha" />
    </div>
    <a class="col-md-12 green-text">Esqueci minha senha</a>
    <div class="col-md-12">
      <button class="col-md-12 default-button">ENTRAR</button>
    </div>

    <p class="col-md-12 text">Não tem conta? <a class="green-text" href="../../pages/user/register/register-user.php">Então Registre-se</a></p>
  </form>
</div>

<?php
include_once("../base/footer.php");
?>