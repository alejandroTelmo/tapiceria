<?php
session_start();
$_SESSION['usuario'];
unset($_SESSION['usuario']);
//unset($_SESSION['usuario']);
header("Location:index.php");
exit();

