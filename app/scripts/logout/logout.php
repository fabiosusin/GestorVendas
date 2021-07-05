<?php 

session_start();

unset($_SESSION['admind']);
unset($_SESSION['logged']);
unset($_SESSION['usuario']);

header('location:../../pages/home/site.php');