<?php require 'header.php'; ?>

    <div class="contenedor">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="formulario2" name="consulta">

		<h1 class="titulo" >Consulta Médica <i class="fa fa-heartbeat" aria-hidden="true"></i></h1><br/>
            <a href="pendientes.php" class="enlace"><i class="submit-btn2 fa fa-arrow-left"></i></a><br/><br/>
		<hr class="border"><br>

		 <label for="datos_personales"><h2>Datos Personales</h2></label><br>

		 <div class="form-group" id="datos_personales">

		    <input type="hidden" value="<?php echo $post['id_consulta']; ?>" name="id">
		    <input type="text" name="cedula" class="datos"  value="<?php echo $post['cedula_paciente'];?>" disabled>
			<input type="text" name="nombre" class="datos" value="<?php echo strtr(strtoupper($post['nombre']), "áéíóú", "ÁÉÍÓÚ");?>" disabled>

		</div>

		    <label for="signos"><h2>Signos Vitales</h2></label><br>

		    <div class="form-group" id="signos">

				<input type="number" name="presion" class="signos" placeholder="Presión Arterial" >
				<input type="number" name="pulso" class="signos" placeholder="Frecuencia Cardiaca">
				<input type="number" name="temperatura" class="signos" placeholder="Temperatura" min="27" max="50">
				<input type="number" name="peso" class="signos" placeholder="Peso">
				<input type="number" name="talla" class="signos" placeholder="Talla">
				<input type="number" name="respiracion" class="signos" placeholder="Respiracion">
		    
		    </div>

		    <label><h2>Diagnóstico Inicial</h2></label><br>

		    <div class="form-group">

		    <div class="izquierda">
		    <label for="sintomas">Sintomas: </label><br><br> 
		    <textarea name="sintomas" placeholder="Introduzca aquí los sintomas" rows="10" cols="50" required id="sintomas"></textarea>
		    </div>
            
            <div class="derecha">
	        <label for="observaciones">Observaciones: </label><br><br>
		    <textarea name="observaciones" placeholder="Introduzca aquí las observaciones" rows="10" cols="50" required 
		    id="observaciones"></textarea>
            </div>
            
        <div class="izquierda">
		  <br><br><label for="inicial"> Primer Diagnóstico:</label><br><br>
		    <textarea name="inicial" placeholder="Introduzca aquí el diagnóstico inicial" rows="5" cols="50" required 
		    id="inicial"></textarea>
		</div>
	         
		    </div>
			
			<p style="clear: left;"></p>
			<br><br>

		<div class="derecha">
		     <label for="tratamiento"><h2>Plan</h2></label><br>
		     <div class="form-group" id="plan">
             <label for="tratamientos">Lista de tratamientos:</label><br><br>
			 <textarea name="tratamientos" placeholder="Introduzca aquí la lista del tratamientos" rows="10" cols="50" required id="tratamientos"></textarea><br>
		     </div>
        </div>

			<label for="pruebas_diagnosticas"><h2>Pruebas Diagnósticas</h2></label><br>

		     <div class="form-group">
                <label for="laboratorio">Pruebas de laboratorio:</label><br><br>
				<input type="text" name="laboratorio" class="datos" placeholder="Exámen de laboratorio" id="laboratorio"><br>
				<label for="rayos_x">Rayos X:</label><br><br>
				<input type="text" name="rayos_x" class="datos" placeholder="Radiografía" id="rayos_x">

		     </div>


			<p style="clear: left;"></p>

			<label for="diagnostico"><h2>Diagnóstico Final</h2></label><br>

		     <div class="form-group">
                <label for="resultados">Resultados:</label><br><br>
				<textarea name="resultados" placeholder="Introduzca aquí los resultados relevantes" rows="7" cols="50" required id="resultados"></textarea><br>
				<div class="izquierda"></div>
				<label for="diagnostico">Diagnóstico: </label><br><br>
				<input type="text" name="diagnostico" class="datos" placeholder="Diagnóstico Final" id="diagnostico">
             
		     </div>

		     <label for="referencias"><h2>Indicaciones y Referencias</h2></label><br>

		     <div class="form-group">
                <label for="indicaciones">Indicaciones:</label><br><br>
				<textarea name="indicaciones" placeholder="Introduzca aquí las indicaciones" rows="7" cols="50" required id="indicaciones"></textarea><br>
				<label for="referencias">Referencias: </label><br><br>
				<textarea name="referencias" placeholder="Introduzca aquí las referencias" rows="7" cols="50" required id="referencias"></textarea><br>
             
		     </div>

			<div class="form-group">
			<div class="derecha"><br><br>
			<br>
			    <input type="radio" name="tipo" value="guardada" checked="checked" id="guardada">
				<label for="guardada">Guardar</label> 
                <input type="radio" name="tipo" value="cerrada" id="cerrada">
                <label for="cerrada">Dar Salida</label><br/><br/>

			    <i class="submit-btn2 fa fa-arrow-right" onclick="consulta.submit()"></i><br><br> 
			</div>
			<p style="clear: right;"></p>
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
<?php require 'footer.php' ?>