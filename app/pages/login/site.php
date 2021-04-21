<!DOCTYPE html>
<html>
<head>
<?php
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
 simplesmente não fazer o login e digitar na barra de endereço do seu navegador
o caminho para a página principal do site (sistema), burlando assim a obrigação de
fazer um login, com isso se ele não estiver feito o login não será criado a session,
então ao verificar que a session não existe a página redireciona o mesmo
 para a index.php.*/
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }

$logado = $_SESSION['login'];
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SISTEMA WEB</title>
</head>

<body>
<table width="800" height="748" border="1">
  <tr>
    <td height="90" colspan="2" bgcolor="#CCCCCC">SISTEM WEB TESTE
    <?php
  echo" Bem vindo $logado";
  ?>
    </td>
  </tr>
  <tr>
    <td width="103" height="410" bgcolor="#CCCCCC">MENU AQUI</td>
    <a href="logout.php">Logout</a>
    <a href="cadastra_cliente.php"> Cadastra Cliente</a>
    <td width="546">CONTEUDO E ICONES AQUI</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#000000"> </td>
  </tr>
</table>
</body>
</html>