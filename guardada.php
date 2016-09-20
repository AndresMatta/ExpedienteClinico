<?php
 
require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);

if (!$conexion) {
header('Location: error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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


actualizarSignos($conexion, $id_consulta, $pa, $fc, $temp, $peso, $talla, $resp);
actualizarCondicion($conexion, $id_consulta, $sintomas, $obs, $dx1);
actualizarTratamiento($conexion, $id_consulta, $tratamientos);
actualizarLaboratorio($conexion, $id_consulta, $lab);
actualizarRayosX($conexion, $id_consulta, $rx);
actualizarDiagnostico($conexion, $id_consulta, $resultados, $dx_final);
actualizarReferencias($conexion, $id_consulta, $referencias, $indicaciones);

actualizarConsulta($id_consulta, $conexion, $tipo);


header('Location: menu.php');

}
else//Inicio del else
{
//Seteo la variable con el valor de id de la consulta.
$id_articulo = id_consulta($_GET['id']);

if (empty($id_articulo)) {
header('Location: menu.php');
}

$post = obtener_consulta_por_id($conexion, $id_articulo);
$post_signos = obtener_signos_por_id($conexion, $id_articulo);
$post_condicion = obtener_condicion_por_id($conexion, $id_articulo);
$post_tratamiento = obtener_tratamiento_por_id($conexion, $id_articulo);
$post_laboratorio = obtener_laboratorio_por_id($conexion, $id_articulo);
$post_rayos = obtener_rayos_por_id($conexion, $id_articulo);
$post_diagnostico = obtener_diagnostico_por_id($conexion, $id_articulo);
$post_referencias = obtener_referencias_por_id($conexion, $id_articulo);

if (!$post) {
header('Location: pendientes.php');
}

$post = $post[0];
$post_signos = $post_signos[0];
$post_condicion = $post_condicion[0];
$post_tratamiento = $post_tratamiento[0];
$post_laboratorio = $post_laboratorio[0];
$post_rayos = $post_rayos[0];
$post_diagnostico =$post_diagnostico[0];
$post_referencias = $post_referencias[0];

}

require 'views/guardada.view.php';

?>