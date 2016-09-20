<?php 

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!empty($_GET['cedula'])) {

    $busqueda = limpiarDatos($_GET['cedula']);

	$statement = $conexion->prepare(
		'SELECT * FROM paciente WHERE cedula = :cedula'
	);
	$statement->execute(array(':cedula' => "$busqueda"));
	$resultados = $statement->fetchAll();

	if (empty($resultados)) {
		$titulo = 'No se encontraron coincidencias con: ' . $busqueda;
	} else {
		$titulo = 'Resultados de la busqueda de: ' . $busqueda;
	}

    }else{
	
	$nombre = limpiarDatos($_GET['nombre']);
	$apellido1 = limpiarDatos($_GET['apellido1']);
	$apellido2 = limpiarDatos($_GET['apellido2']);

	$statement = $conexion->prepare('SELECT * FROM paciente 
		WHERE nombre LIKE :nombre or apellido1 LIKE :apellido1 or apellido2 LIKE :apellido2');
	$statement->execute(array(':nombre' => "$nombre",
		                      ':apellido1' => "$apellido1",
		                      ':apellido2' => "$apellido2"
		                     ));

	$resultados = $statement->fetchAll();

	if (empty($resultados)) {
		$titulo = 'No se encontraron coincidencias con: ' . $nombre . " " . $apellido1 . " " . $apellido2;
	} else {
		$titulo = 'Resultados de la busqueda de: ' . $nombre . " " . $apellido1 . " " . $apellido2;
	}

    }

    } else {
	header('Location: ' . RUTA . '/index.php');
}

require 'views/buscar.view.php';

?>
