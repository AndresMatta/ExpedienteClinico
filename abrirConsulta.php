<?php 

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $cedula = $_POST['cedula'];
   $errores = "";
   $resultados = obtener_paciente_por_cedula($conexion, $cedula);

  if (empty($resultados)) {
  	$errores .= '<li>No se han encontrado resultados</li>';
  }else{
  header("Location: existe.php?cedula=". $_POST['cedula']);
  }
  
}

require 'views/abrirConsulta.view.php';
?>