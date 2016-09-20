<?php session_start();//Inicia una sesion
//Si hay una sesion iniciada redirecciona al contenido.
if (isset($_SESSION['usuario'])) {
	header('Location: menu.php');
} else {//Si no, lleva al registro.s
	header('Location: login.php');
}

 ?>