<?php 

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: error.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

if (empty($_POST['cedula'])) {

	$nombre = $_POST['nombre'];
	$apellido1 = $_POST['apellido1'];
	$apellido2 = $_POST['apellido2'];

	header('Location: buscar.php?nombre='.urldecode($nombre).'&apellido1='.urldecode($apellido1).
		'&apellido2='.urldecode($apellido2));

}elseif (!empty($_POST['cedula'])&&empty($_POST['nombre'])&&empty($_POST['apellido1'])&&empty($_POST['apellido2'])) {

	$cedula = $_POST['cedula'];

	header('Location: buscar.php?cedula='.urldecode($cedula));
}



}


require 'views/busqueda.view.php';
?>