<?php
session_start();//Inicia una sesion
//En caso de existir una sesion.
if (!isset($_SESSION['usuario'])){
	header('Location: login.php');
}
require 'admin/config.php';


require 'views/menu.view.php';

?>