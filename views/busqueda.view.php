<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/estilos1.css">
	<title>Abrir Consulta</title>
</head>

<body>
	<div class="contenedor">
	<h1 class="titulo">Buscar Paciente</h1>
	
        <a href="menu.php"><i class="submit-btn fa fa-home fa-4x"></i>Volver al inicio</a>

		<hr class="border">

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="buscarCedula">
			<div class="form-group">
		    <i class="icono izquierda fa fa-search" aria-hidden="true"></i><input type="text" name="cedula" class="datos" placeholder="Buscar Cédula" maxlength="9">
		    <i class="submit-btn2 fa fa-arrow-right" onclick="buscarCedula.submit() " id="buscar"></i>
			</div><br/>
		</form>

        <hr class="border">

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="buscarNombre">
			<div class="form-group">
			<div class="derecha">
		    <i class="submit-btn2 fa fa-arrow-right" onclick="buscarNombre.submit() " id="buscar"></i>
			</div>
		    <i class="icono izquierda fa fa-search" aria-hidden="true"></i>
		    <input type="text" name="nombre" class="datos" placeholder="Nombre" required><br>
		    <i class="icono izquierda fa fa-search" aria-hidden="true"></i>
		    <input type="text" name="apellido1" class="datos" placeholder="Primer Apellido"><br>
		    <i class="icono izquierda fa fa-search" aria-hidden="true"></i>
		    <input type="text" name="apellido2" class="datos" placeholder="Segundo Apellido"><br>
		    
			</div><br/>
		</form>
	</div>	
</body>
</html>