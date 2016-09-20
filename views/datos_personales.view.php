<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/estilos1.css">
	<title>Datos Personales</title>
</head>
<body>
<br><br>
	<div class="contenedor2">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="datos_personales">
		<h1 class="titulo2"><i class="fa fa-plus-square" aria-hidden="true"></i> Consulta Emergencias <i class="fa fa-plus-square" aria-hidden="true"></i></h1>
            <a href="menu.php"><i class="submit-btn2 fa fa-home fa-2x"></i></a><br><br>
		<hr class="border">

		    <div class="form-group">
				<input type="text" name="cedula" class="nombre" placeholder="Cédula" maxlength=9>
				<input type="text" name="nombre" class="nombre" placeholder="Nombre"><br/><br/>
				<input type="text" name="apellido1" class="nombre" placeholder="Primer apellido" >
				<input type="text" name="apellido2" class="nombre" placeholder="Segundo apellido"><br/><br/>
		    </div>
		    
		    <div class="form-group">
            <div class="derecha">
		         Sexo:<br/><br/>

                <input type="radio" name="gender" value="masculino" id="hombre" checked="checked"s>
				<label for="hombre">Masculino</label> 
                <input type="radio" name="gender" value="femenino" id="mujer">
                <label for="mujer">Femenino</label><br/><br/>
                </div>
            </div>

			<div class="form-group">
				<label for="fecha_nac">Fecha de nacimiento: </label><br/></br/>
				<input type="date" name="fecha_nac" id="fecha_nac" value="2016-01-01" class="nombre" max="2035-01-01" min="1910-01-01"><br/><br/>
		    </div>

            <div class="form-group">
                <input type="tel" name="telefono1" class="contacto" maxlength=8 placeholder="Telefono 1">
                <input type="tel" name="telefono2" class="contacto" maxlength=8 placeholder="Telefono 2"><br><br>
                <input type="email" name="email" class="usuario" placeholder="E-mail"><br/><br/>
			</div>

			<div class="form-group">
				<input type="text" name="direccion" class="usuario" placeholder="Dirección"><br/><br/>
				<input type="text" name="padre" class="usuario" placeholder="Nombre del Padre"><br/>
				<br/>
				<input type="text" name="madre" class="usuario" placeholder="Nombre de la Madre"><br/>
				<br/>
			</div>

            <div class="form-group"> 
            <br/><br/><i class="submit-btn2" onclick="datos_personales.submit()">Enviar Consulta</i>
			</div>

			<?php if(!empty($errores)): ?> 
		    <div class="error">
			<ul>
			<?php echo $errores; ?>
			</ul>
			</div>
			<?php endif; ?>
				
		</form>
	</div>	
</body>
</html>