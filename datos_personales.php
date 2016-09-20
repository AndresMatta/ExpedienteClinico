<?php session_start();//Inicia una sesion
//En caso de existir una sesion.
if (isset($_SESSION['usuario'])) {
	require 'views/datos_personales.view.php';
} else {//Si no, devuelve al login.
	header('Location: login.php');
}
require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);

if (!$conexion) {
	header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$apellido1 = filter_var($_POST['apellido1'], FILTER_SANITIZE_STRING);
	$apellido2 = filter_var($_POST['apellido2'], FILTER_SANITIZE_STRING);
	$cedula = $_POST['cedula'];
	$gender = $_POST['gender'];
	$telefono1 = filter_var($_POST['telefono1'], FILTER_SANITIZE_STRING);
	$telefono2 = filter_var($_POST['telefono2'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
	$padre = filter_var($_POST['padre'], FILTER_SANITIZE_STRING);
	$madre = filter_var($_POST['madre'], FILTER_SANITIZE_STRING);
	$fecha_nac = $_POST['fecha_nac'];

	$errores = '';
    
    if (empty($nombre) or empty($apellido1) or empty($apellido2) or empty($cedula))  {
		echo $errores .= '<li>Por favor rellene todos los datos correctamente</li>';
	} else {
    
    if ($errores == '') {
		$statement = $conexion->prepare('INSERT INTO paciente (id, cedula, telefono, telefono2, genero, email, nombre, apellido1, apellido2, fecha_nac, direccion, padre, madre) VALUES (null, :cedula, :telefono1, :telefono2, :genero, :email, :nombre, :apellido1, :apellido2, :fecha_nac, :direccion, :padre, :madre)');
		$statement->execute(array(
			':cedula' => $cedula,
			':telefono1' => $telefono1,
			':telefono2' => $telefono2,
			':genero' => $gender,
			':email' => $email,
			':nombre' => $nombre,
			':apellido1' => $apellido1,
			':apellido2' => $apellido2,
			':fecha_nac' => $fecha_nac,
			':direccion' => $direccion,
			':padre' => $padre,
			':madre' => $madre
		));
    
        $id_paciente = obtener_paciente($conexion, $cedula);
        iniciarConsulta($nombre, $apellido1, $apellido2, $id_paciente, $cedula, $conexion);

		header('Location: menu.php');
	}
}}
?>