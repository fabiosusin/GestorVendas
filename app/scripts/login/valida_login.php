<?php 

include '../../scripts/conexao/conexao.php';

$usuario = addslashes($_POST['usuario']);
$senha = addslashes($_POST['senha']);

$query = "SELECT * FROM USUARIOS WHERE login = '$usuario' and senha = '$senha' limit 1";
echo $query;
$consulta = mysqli_query($conexao, $query);

if(mysqli_num_rows($consulta) == 1){

	session_start();
	$_SESSION['login'] = true;
	$_SESSION['usuario'] = $usuario;

	header('location:../../pages/home/site.php');
}
else
	header('location:/gestorvendas/app/pages/login/login.php');