<?php
 
require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);

if (!$conexion) {
header('Location: error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//Se inicializan las variables con los datos obtenidos del formulario
$id_consulta = $_POST['id'];
$pa = $_POST['presion'];
$fc = $_POST['pulso'];
$temp = $_POST['temperatura'];
$peso = $_POST['peso'];
$talla = $_POST['talla'];
$resp = $_POST['respiracion'];
$sintomas = limpiarDatos($_POST['sintomas']);
$obs = limpiarDatos($_POST['observaciones']);
$dx1 = limpiarDatos($_POST['inicial']);
$tratamientos = limpiarDatos($_POST['tratamientos']);
$lab = limpiarDatos($_POST['laboratorio']);
$rx = limpiarDatos($_POST['rayos_x']);
$resultados = limpiarDatos($_POST['resultados']);
$dx_final = limpiarDatos($_POST['diagnostico']);
$indicaciones = limpiarDatos($_POST['indicaciones']);
$referencias = limpiarDatos($_POST['referencias']);
$tipo = $_POST['tipo'];
  //Se insertan todos los datos cargando las funciones.
  insertarSignos($conexion, $id_consulta, $pa, $fc, $temp, $peso, $talla, $resp);
  insertarCondicion($conexion, $id_consulta, $sintomas, $obs, $dx1);
  insertarTratamiento($conexion, $id_consulta, $tratamientos);
  insertarLaboratorio($conexion, $id_consulta, $lab);
  insertarRayosX($conexion, $id_consulta, $rx);
  insertarDiagnostico($conexion, $id_consulta, $resultados, $dx_final);
  insertarReferencias($conexion, $id_consulta, $referencias, $indicaciones);

  actualizarConsulta($id_consulta, $conexion, $tipo);

$post = obtener_consulta_por_id($conexion, $id_consulta);

if (!$post) {
header('Location: pendientes.php');
}

$post = $post[0];

header('Location: pendientes.php');

}
else//Inicio del else
{

$id_articulo = id_consulta($_GET['id']);
if (empty($id_articulo)) {
header('Location: menu.php');
}


$post = obtener_consulta_por_id($conexion, $id_articulo);

if (!$post) {
header('Location: pendientes.php');
}

$post = $post[0];

actualizarIngreso($id_articulo,$conexion);

}

require 'views/consulta.view.php';

?>

