<?php session_start();//Inicia una sesion
//En caso de existir una sesion.
if (isset($_SESSION['usuario'])) {

} else {//Si no, devuelve al login.
	header('Location: login.php');
}

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: error.php');
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
	}else{
	actualizarPaciente($conexion, $cedula, $nombre, $apellido1, $apellido2, $gender, $telefono1, $telefono2, $email,
	$direccion, $padre, $madre, $fecha_nac);
	}
    
    $id_paciente = obtener_paciente($conexion, $cedula);
    iniciarConsulta($nombre, $apellido1, $apellido2, $id_paciente, $cedula, $conexion);

header('Location: menu.php');

}
else//Inicio del else
{
//Seteo la variable con el valor de id de la consulta.
$cedula = id_consulta($_GET['cedula']);
//Si la cedula está vacía
if (empty($cedula)) {
header('Location: menu.php');
}
//Aquí se obtienen todos los datos del paciente
$post = obtener_paciente_por_cedula($conexion, $cedula);
//Si no hay datos del paciente
if (!$post) {
header('Location: menu.php');
}
//Al traer los datos lo hace un arreglo bidimensional, por esto igualo la variable al arreglo en el valor 0.
$post = $post[0];

}

require 'views/existe.view.php';
?>