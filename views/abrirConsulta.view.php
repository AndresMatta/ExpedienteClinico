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
	<h1 class="titulo">Abrir Consulta</h1>
	
        <a href="menu.php"><i class="submit-btn fa fa-home fa-4x"></i>Volver al inicio</a>

		<hr class="border">

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="abrir">


			<div class="form-group">
		    <i class="icono izquierda fa fa-search" aria-hidden="true"></i><input type="text" name="cedula" class="datos" placeholder="Buscar Cédula" maxlength="9">
		    <i class="submit-btn2 fa fa-arrow-right" onclick="abrir.submit() " id="buscar"></i>
			</div><br/>
			<?php if(!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif; ?>
		</form>
        <p class="texto-registrate">
			¿ El paciente no está registrado ?
			<a href="datos_personales.php">Incluir al paciente</a>
		</p>
	</div>	
</body>
</html>