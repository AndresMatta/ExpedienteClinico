<?php 
//Conectar con la base de datos por medio de PDO.
function conexion($bd_config){//Inicio de Función.
	try {//Inicio del try
		$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
		return $conexion;
	} catch (PDOException $e) {
		return false;
}//Fin del catch
}//Fin de la función.

//Limpia los datos ingresados para evitar inyecciones.
function limpiarDatos($datos){//Inicio de la función
	$datos = trim($datos);
	$datos = stripslashes($datos);
	$datos = htmlspecialchars($datos);
	return $datos;
}//Fin de la función

//Devuelve el id de una consulta específica
function id_consulta($id){//Inicio de funcion
	return (int)limpiarDatos($id);
}//fin de la función

//Devuelve un entero con el número de la página
function pagina_actual(){//Inicio de función.
	return isset($_GET['p']) ? (int)$_GET['p'] : 1;

}//Fin de la función

//Devuelve el numero de páginas que aparecerán en la paginación.
function numero_paginas($post_por_pagina, $conexion){//Inicio de la función.
	$total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');//Selecciona todas las filas
	$total_post->execute();
	$total_post = $total_post->fetch()['total'];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}//Fin de la función.

function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

	$dia = date('d', $timestamp); 
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = "$dia de " . $meses[$mes] . " del $year";
	return $fecha;
}

                                /* OBTENER */

//Devuelve la consulta con el id que se da como parámetro
function obtener_consulta_por_id($conexion, $id){//Inicio de la función.
	$resultado = $conexion->query("SELECT * FROM consulta WHERE id_consulta = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;//En caso de que no exista un campo con dicho id, retorna false.
}//Fin de la función.

function obtener_paciente_por_cedula($conexion, $cedula){//Inicio de la función.
	$resultado = $conexion->query("SELECT * FROM paciente WHERE cedula = $cedula LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;//En caso de que no exista un campo con dicho id, retorna false.
}//Fin de la función.

//Devuelve la consulta con el id que se da como parámetro
function obtener_signos_por_id($conexion, $id){//Inicio de la función.
	$resultado = $conexion->query("SELECT * FROM consulta_signos WHERE id_consulta = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;//En caso de que no exista un campo con dicho id, retorna false.
}//Fin de la función.

//Devuelve la consulta con el id que se da como parámetro
function obtener_condicion_por_id($conexion, $id){//Inicio de la función.
	$resultado = $conexion->query("SELECT * FROM consulta_condicion WHERE id_consulta = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;//En caso de que no exista un campo con dicho id, retorna false.
}//Fin de la función.

function obtener_tratamiento_por_id($conexion, $id){//Inicio de la función.
	$resultado = $conexion->query("SELECT * FROM consulta_tratamiento WHERE id_consulta = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;//En caso de que no exista un campo con dicho id, retorna false.
}//Fin de la función.

function obtener_laboratorio_por_id($conexion, $id){//Inicio de la función.
	$resultado = $conexion->query("SELECT * FROM consulta_laboratorio WHERE id_consulta = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;//En caso de que no exista un campo con dicho id, retorna false.
}//Fin de la función.

function obtener_rayos_por_id($conexion, $id){//Inicio de la función.
	$resultado = $conexion->query("SELECT * FROM consulta_rx WHERE id_consulta = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;//En caso de que no exista un campo con dicho id, retorna false.
}//Fin de la función.

function obtener_diagnostico_por_id($conexion, $id){//Inicio de la función.
	$resultado = $conexion->query("SELECT * FROM consulta_diagnostico WHERE id_consulta = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;//En caso de que no exista un campo con dicho id, retorna false.
}//Fin de la función.

function obtener_referencias_por_id($conexion, $id){//Inicio de la función.
	$resultado = $conexion->query("SELECT * FROM referencias_indicaciones WHERE id_consulta = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;//En caso de que no exista un campo con dicho id, retorna false.
}//Fin de la función.

//Devuelve todas las consultas que aún no han sido cerradas.
function obtener_consultas($post_por_pagina, $conexion){//Inicio de función.
	$inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM consulta WHERE concluida != 'cerrada' LIMIT $inicio, $post_por_pagina");
	$sentencia->execute();
	return $sentencia->fetchAll();
}//Fin de la función.

//Devuelve el id del paciente con la cedula que se envía como parámetro.
function obtener_paciente($conexion, $cedula){//Inicio de función.
	$statement = $conexion->prepare("SELECT * FROM paciente WHERE cedula = $cedula LIMIT 1");
	$statement->execute();
	$resultado = $statement->fetchAll();
	$id_paciente = $resultado['0']['id'];
	return $id_paciente;
}//Fin de la función.


                               /* ACTUALIZAR */


//Actualiza la hora de ingreso al momento en el médico abre la consulta.
function actualizarIngreso($id_consulta,$conexion){//Inicio función
date_default_timezone_set('America/Costa_Rica');
$hora = date('H:i:s');
$statement = $conexion->prepare("UPDATE consulta SET hora_ingreso = :hora_ingreso WHERE id_consulta = :id LIMIT 1");
$statement->execute(array(':hora_ingreso' => $hora, ':id'=>$id_consulta));
}//Fin de función

//Actualiza la hora de ingreso al momento en el médico abre la consulta.
function actualizarEgreso($id_consulta,$conexion){//Inicio función
date_default_timezone_set('America/Costa_Rica');
$hora = date('H:i:s');
$statement = $conexion->prepare("UPDATE consulta SET hora_egreso = :hora_egreso WHERE id_consulta = $id_consulta LIMIT 1");
$statement->execute(array(':hora_egreso' => $hora));
}//Fin de función

function actualizarPaciente($conexion, $cedula, $nombre, $apellido1, $apellido2, $gender, $telefono1, $telefono2, $email,
	$direccion, $padre, $madre, $fecha_nac){

$statement = $conexion->prepare("UPDATE paciente SET cedula = :cedula, nombre = :nombre, apellido1 = :apellido1,
apellido2 = :apellido2, genero = :gender, telefono = :telefono1, telefono2 = :telefono2, email = :email, 
direccion = :direccion, padre = :padre, madre = :madre, fecha_nac = :fecha_nac  WHERE cedula = :cedula LIMIT 1");
$statement->execute(array(
	':cedula' => $cedula,
	':telefono1' => $telefono1,
	':telefono2' => $telefono2,
    ':gender' => $gender,
    ':email' => $email,
	':nombre' => $nombre,
	':apellido1' => $apellido1,
	':apellido2' => $apellido2,
	':fecha_nac' => $fecha_nac,
	':direccion' => $direccion,
	':padre' => $padre,
	':madre' => $madre
	));

}

function actualizarSignos($conexion, $id_consulta, $pa, $fc, $temp, $peso, $talla, $resp){

$statement = $conexion->prepare("UPDATE consulta_signos SET pa = :presion, fc = :pulso, temp = :temperatura, peso = :peso, talla = :talla, resp = :respiracion WHERE id_consulta = :id LIMIT 1");
$statement->execute(array(
	':id'=>$id_consulta,
	':presion'=>$pa,
	':pulso'=>$fc,
	':temperatura'=>$temp,
	':peso'=>$peso,
	':talla'=>$talla,
	':respiracion'=>$resp
	));
}

function actualizarCondicion($conexion, $id_consulta, $sintomas, $obs, $dx1){

$statement = $conexion->prepare("UPDATE consulta_condicion SET sintomas = :sintomas, 
	observaciones = :observaciones, dx_inicial = :inicial WHERE id_consulta = :id LIMIT 1");
$statement->execute(array(
	':id'=>$id_consulta,
	':sintomas'=>$sintomas,
	':observaciones'=>$obs,
	':inicial'=>$dx1,
	));
}

function actualizarTratamiento($conexion, $id_consulta, $tratamientos){

$statement = $conexion->prepare("UPDATE consulta_tratamiento SET tratamientos = :tratamientos 
	WHERE id_consulta = :id LIMIT 1");
$statement->execute(array(
	':id'=>$id_consulta,
	':tratamientos'=> $tratamientos
	));
}

function actualizarLaboratorio($conexion, $id_consulta, $lab){

$statement = $conexion->prepare("UPDATE consulta_laboratorio SET examenes = :laboratorio 
	WHERE id_consulta = :id LIMIT 1");
$statement->execute(array(
	':id'=>$id_consulta,
	':laboratorio'=> $lab
	));
}

function actualizarRayosX($conexion, $id_consulta, $rx){

$statement = $conexion->prepare("UPDATE consulta_rx SET rx = :rayos_x 
	WHERE id_consulta = :id LIMIT 1");
$statement->execute(array(
	':id'=>$id_consulta,
	':rayos_x'=> $rx
	));
}

function actualizarDiagnostico($conexion, $id_consulta, $resultados, $dx_final){

$statement = $conexion->prepare("UPDATE consulta_diagnostico SET resultados = :resultados, diagnostico = :diagnostico 
	WHERE id_consulta = :id LIMIT 1");
$statement->execute(array(
	':id'=>$id_consulta,
	':resultados'=> $resultados,
	':diagnostico'=>$dx_final
	));
}

function actualizarReferencias($conexion, $id_consulta, $referencias, $indicaciones){

$statement = $conexion->prepare("UPDATE referencias_indicaciones SET referencias = :referencias, indicaciones = :indicaciones 
	WHERE id_consulta = :id LIMIT 1");
$statement->execute(array(
	':id'=>$id_consulta,
	':referencias'=> $referencias,
	':indicaciones'=>$indicaciones
	));
}

function actualizarConsulta($id_consulta, $conexion, $tipo){
$statement = $conexion->prepare("UPDATE consulta SET concluida = :tipo WHERE id_consulta = $id_consulta LIMIT 1");
$statement->execute(array(':tipo' => $tipo));	
}


                                 /* INSERTAR */


function insertarSignos($conexion, $id_consulta, $pa, $fc, $temp, $peso, $talla, $resp){
 
 $statement = $conexion->prepare('INSERT INTO consulta_signos (id, id_consulta, pa, fc, temp, peso, talla, resp) 
	VALUES (null, :id_consulta, :presion, :pulso, :temperatura, :peso, :talla, :respiracion)');
 $statement->execute(array(
			':id_consulta' => $id_consulta,
			':presion' => $pa,
			':pulso' => $fc,
			':temperatura'=> $temp,
			':peso' => $peso,
			'talla' => $talla,
			'respiracion' => $resp
			));
}

function insertarCondicion($conexion, $id_consulta, $sintomas, $obs, $dx1){
    
$statement2 = $conexion->prepare('INSERT INTO consulta_condicion (id, id_consulta, sintomas, observaciones, dx_inicial) VALUES (null, :id_consulta, :sintomas, :observaciones, :inicial)');
    $statement2 -> bindParam(':id_consulta', $id_consulta);
    $statement2 -> bindParam(':sintomas', $sintomas);
    $statement2 -> bindParam(':observaciones', $obs);
    $statement2 -> bindParam(':inicial', $dx1);

    $statement2->execute();
}

function insertarTratamiento($conexion, $id_consulta, $tratamientos){
    
$statement2 = $conexion->prepare('INSERT INTO consulta_tratamiento (id, id_consulta, tratamientos) VALUES (null, :id_consulta, :tratamientos)');
    $statement2 -> bindParam(':id_consulta', $id_consulta);
    $statement2 -> bindParam(':tratamientos', $tratamientos);
    $statement2->execute();
}

function insertarLaboratorio($conexion, $id_consulta, $lab){
    
$statement2 = $conexion->prepare('INSERT INTO consulta_laboratorio (id, id_consulta, examenes) VALUES (null, :id_consulta, :laboratorio)');
    $statement2 -> bindParam(':id_consulta', $id_consulta);
    $statement2 -> bindParam(':laboratorio', $lab);
    $statement2->execute();
}

function insertarRayosX($conexion, $id_consulta, $rx){
    
$statement2 = $conexion->prepare('INSERT INTO consulta_rx (id, id_consulta, rx) VALUES (null, :id_consulta, :rayos_x)');
    $statement2 -> bindParam(':id_consulta', $id_consulta);
    $statement2 -> bindParam(':rayos_x', $rx);
    $statement2->execute();
}

function insertarDiagnostico($conexion, $id_consulta, $resultados, $dx_final){
    
$statement2 = $conexion->prepare('INSERT INTO consulta_diagnostico (id, id_consulta, resultados, diagnostico) VALUES (null, :id_consulta, :resultados, :diagnostico)');
    $statement2 -> bindParam(':id_consulta', $id_consulta);
    $statement2 -> bindParam(':resultados', $resultados);
    $statement2 -> bindParam(':diagnostico', $dx_final);
    $statement2->execute();
}

function insertarReferencias($conexion, $id_consulta, $referencias, $indicaciones){
    
    $statement2 = $conexion->prepare('INSERT INTO referencias_indicaciones (id, id_consulta, referencias, indicaciones) VALUES (null, :id_consulta, :referencias, :indicaciones)');
    $statement2 -> bindParam(':id_consulta', $id_consulta);
    $statement2 -> bindParam(':referencias', $referencias);
    $statement2 -> bindParam(':indicaciones', $indicaciones);
    $statement2->execute();
}


//Inicia una nueva consulta al paciente con el id que se pasa como parámetro.
function iniciarConsulta($nombre, $apellido1, $apellido2, $id_paciente, $cedula, $conexion){//Inicio de función.
    $hora_ingreso = 0;
    $hora_egreso = 0;
    $tipo_consulta = "normal";
    $concluida = "pendiente";
    $nombre_pac = $nombre . " " . $apellido1 . " " . $apellido2;//Concatena los valores.
     
	$statement = $conexion->prepare('INSERT INTO consulta (id_consulta, id_paciente, cedula_paciente, nombre, hora_ingreso, hora_egreso, tipo_consulta, concluida) VALUES (null, :id_paciente, :cedula, :nombre, :hora_ingreso, :hora_egreso, :tipo_consulta, :concluida)');
	$statement->execute(array(
			':cedula' => $cedula,
			':id_paciente' => $id_paciente,
			':nombre' => $nombre_pac,
			':hora_ingreso'=> $hora_ingreso,
			':hora_egreso' => $hora_egreso,
			'tipo_consulta' => $tipo_consulta,
			'concluida' => $concluida
			));
}//Fin de la función.

    

?>