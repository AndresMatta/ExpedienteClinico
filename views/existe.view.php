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
            <br>
		    <div class="form-group">
                <div class="izquierda">
		        <label for="cedula" class="izquierda">Cédula: </label><br>
				<input type="text" name="cedula" class="izquierda nombre" value="<?php echo $post['cedula'];?>" id="cedula" maxlength=9>
                </div>
                <div class="izquierda">
  				<label for="nombre" class="izquierda">Nombre: </label><br>
				<input type="text" name="nombre" class="izquierda nombre" placeholder="Nombre" 
				value="<?php echo strtr(strtoupper($post['nombre']), "áéíóú", "ÁÉÍÓÚ");?>"><br/><br/>
				</div>
				<div class="izquierda">
				<label for="ap1" class="izquierda">Primer Apellido: </label><br>
				<input type="text" name="apellido1" class="izquierda nombre" placeholder="Primer apellido" 
				value="<?php echo strtr(strtoupper($post['apellido1']), "áéíóú", "ÁÉÍÓÚ");?>" id="ap1">
				</div>
				<div class="izquierda">
				<label for="ap2" class="izquierda">Segundo Apellido: </label><br>
				<input type="text" name="apellido2" class="izquierda nombre" placeholder="Segundo apellido" 
				value="<?php echo strtr(strtoupper($post['apellido2']), "áéíóú", "ÁÉÍÓÚ");?>" id="ap2"><br/><br/>
		        </div>
		    </div>

           
            <p style="clear: left;"></p>
            <br><br>
		    <div class="izquierda form-group">
				<label for="fecha_nac">Fecha de nacimiento: </label><br/>
				<input type="date" name="fecha_nac" class="nombre" id="fecha_nac" value="<?php echo $post['fecha_nac'];?>" 
				max="2035-01-01" min="1910-01-01">
		    </div>

		    <div class="izquierda genero">
		        <label for="hombre">Sexo:</label><br><br>
		        <?php if($post['genero']=="masculino"): ?>
				<input type="radio" name="gender" value="masculino" checked="checked" id="hombre">
				<label for="hombre">Masculino</label> 
                <input type="radio" name="gender" value="femenino" id="mujer">
                <label for="mujer">Femenino</label><br/><br/>
                <?php else: ?>
                <input type="radio" name="gender" value="masculino" id="hombre">
				<label for="hombre">Masculino</label> 
                <input type="radio" name="gender" value="femenino" id="mujer" checked="checked">
                <label for="mujer">Femenino</label><br/><br/>
                <?php endif; ?>
            </div>

            <p style="clear: left;"></p>
            <br><br>
            <div class="form-group">
                <label for="telefono" class="izquierda">Número de teléfono:</label><br>
                <input type="tel" name="telefono1" class="izquierda contacto" value="<?php echo $post['telefono'];?>" 
                maxlength=8 placeholder="Telefono 1" id="telefono">

                <input type="tel" name="telefono2" class="izquierda contacto" value="<?php echo $post['telefono2'];?>"
                maxlength=8 placeholder="Telefono 2"><br><br>
                <p style="clear: left;"></p>
                <label for="email">Correo electrónico: </label>
                <input type="email" name="email" class="usuario" value="<?php echo $post['email'];?>" placeholder="E-mail" 
                id="email"><br/>
                <br/>

			</div>

			<div class="form-group">
			    <label for= "direccion">Dirección: </label>
				<input type="text" name="direccion" class="usuario" 
				value="<?php echo strtr(strtoupper($post['direccion']), "áéíóú", "ÁÉÍÓÚ");?>" placeholder="Dirección" 
				id="direccion"><br/><br/>
				<label for= "padre">Nombre del Padre: </label>
				<input type="text" name="padre" class="usuario" 
				value="<?php echo strtr(strtoupper($post['padre']), "áéíóú", "ÁÉÍÓÚ");?>" placeholder="Nombre del Padre" 
				id="padre"><br/><br/>
				<label for= "madre">Nombre de la Madre: </label>
				<input type="text" name="madre" class="usuario" 
				value="<?php echo strtr(strtoupper($post['madre']), "áéíóú", "ÁÉÍÓÚ");?>" placeholder="Nombre de la Madre" 
				id="madre"><br/>
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