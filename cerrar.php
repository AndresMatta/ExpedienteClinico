<?php session_start();
//Termina la sesion.
session_destroy();
$_SESSION = array();
//Redirecciona al login.
header('Location: login.php');

?>