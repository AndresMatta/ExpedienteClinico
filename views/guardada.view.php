<?php require 'header.php'; ?>

	<div class="contenedor">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="formulario2" name="consulta">

		<h1 class="titulo2" >Consulta Médica <i class="fa fa-heartbeat" aria-hidden="true"></i></h1><br/>
            <a href="menu.php" class="enlace"><i class="submit-btn2 fa fa-hand-o-left"> Volver</i></a><br/><br/>
		<hr class="border"><br>

		 <label><h2>Datos Personales</h2></label><br><br>

		    <div class="form-group" id="signos">

		        <input type="hidden" value="<?php echo $post['id_consulta']; ?>" name="id">
				<input type="text" name="cedula" class="datos"  value="<?php echo $post['cedula_paciente'];?>" placeholder="Cédula" maxlength=9 disabled>
				<input type="text" name="nombre" class="datos" value="<?php echo strtr(strtoupper($post['nombre']), "áéíóú", "ÁÉÍÓÚ");?>" placeholder="Nombre" disabled>

		    </div>

		    <label for="signos"><h2>Signos Vitales</h2></label><br><br>

		    <div class="form-group">

				<input type="number" name="presion" class="signos" value="<?php echo $post_signos['pa'];?>" placeholder="Presión Arterial" >
				<input type="number" name="pulso" class="signos" value="<?php echo $post_signos['fc'];?>" placeholder="Frecuencia Cardiaca">
				<input type="number" name="temperatura" class="signos" value="<?php echo $post_signos['temp'];?>" placeholder="Temperatura" min="27" max="50">
				<input type="number" name="peso" class="signos" value="<?php echo $post_signos['peso'];?>" placeholder="Peso">
				<input type="number" name="talla" class="signos" value="<?php echo $post_signos['talla'];?>" placeholder="Talla">
				<input type="number" name="respiracion" class="signos" value="<?php echo $post_signos['resp'];?>" placeholder="Respiracion">
		    
		    </div>

		    <label><h2>Diagnóstico Inicial</h2></label><br>

		    <div class="form-group">

		    <div class="izquierda">
		    <label for="sintomas">Sintomas: </label><br><br> 
		    <textarea name="sintomas" placeholder="Introduzca aquí los sintomas" rows="10" cols="50" required id="sintomas"><?php echo $post_condicion['sintomas'];?></textarea>
		    </div>
            
            <div class="derecha">
	        <label for="observaciones">Observaciones: </label><br><br>
		    <textarea name="observaciones" placeholder="Introduzca aquí las observaciones" rows="10" cols="50" required 
		    id="observaciones"><?php echo $post_condicion['observaciones'];?></textarea>
            </div>
            
            <div class="izquierda"><br><br>
		    <label for="inicial"> Primer Diagnóstico:</label><br><br>
		    <textarea name="inicial" placeholder="Introduzca aquí el diagnóstico inicial" rows="5" cols="50" required 
		    id="inicial"><?php echo $post_condicion['dx_inicial'];?></textarea>
		    </div>
	         
		    </div>
			
			<p style="clear: left;"></p>
            <br><br>

		<div class="derecha">
		     <label for="tratamiento"><h2>Plan</h2></label><br>
		     <div class="form-group" id="plan">
             <label for="tratamientos">Lista de tratamientos:</label><br><br>
			 <textarea name="tratamientos" placeholder="Introduzca aquí la lista del tratamientos" rows="10" cols="50" required id="tratamientos"><?php echo $post_tratamiento['tratamientos'];?></textarea><br>
		     </div>
        </div>

			<label for="pruebas_diagnosticas"><h2>Pruebas Diagnósticas</h2></label><br>

		     <div class="form-group">
                <label for="laboratorio">Pruebas de laboratorio:</label><br><br>
				<input type="text" name="laboratorio" class="datos" placeholder="Exámen de laboratorio" id="laboratorio" value="<?php echo $post_laboratorio['examenes'];?>"><br>
				<label for="rayos_x">Rayos X:</label><br><br>
				<input type="text" name="rayos_x" class="datos" placeholder="Radiografía" id="rayos_x" value="<?php echo $post_rayos['rx'];?>">

		     </div>


			<p style="clear: left;"></p>

			<label for="diagnostico"><h2>Diagnóstico Final</h2></label><br>

		     <div class="form-group">
                <label for="resultados">Resultados:</label><br><br>
				<textarea name="resultados" placeholder="Introduzca aquí los resultados relevantes" rows="7" cols="50" required id="resultados"><?php echo $post_diagnostico['resultados'];?></textarea><br>
				<div class="izquierda"></div>
				<label for="diagnostico">Diagnóstico: </label><br><br>
				<input type="text" name="diagnostico" class="datos" placeholder="Diagnóstico Final" id="diagnostico" value="<?php echo $post_diagnostico['diagnostico'];?>">
             
		     </div>

		        <label for="referencias"><h2>Indicaciones y Referencias</h2></label><br>

		     <div class="form-group">
                <label for="indicaciones">Indicaciones:</label><br><br>
				<textarea name="indicaciones" placeholder="Introduzca aquí las indicaciones" rows="7" cols="50" required id="indicaciones"><?php echo $post_referencias['indicaciones'];?></textarea><br>
				<label for="referencias">Referencias: </label><br><br>
				<textarea name="referencias" placeholder="Introduzca aquí las referencias" rows="7" cols="50" required id="referencias"><?php echo $post_referencias['referencias'];?></textarea><br>
             
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