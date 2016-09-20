<?php
require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: error.php');
}

$consultas = obtener_consultas($blog_config['post_por_pagina'], $conexion);

if (!$consultas) {
	header('Location: error.php');
}

require 'views/pendientes.view.php';
?>