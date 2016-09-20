<?php require 'header.php'; ?>

    <div class="contenedor">
            <h2><?php echo $titulo; ?></h2><br><br>
            <?php foreach($resultados as $post): ?>
                <div class="izquierda post2">
                    <article>
                        <h2 class="titulo"><a href="single.php?cedula=<?php echo $post['cedula']; ?>">
                        <?php echo strtoupper($post['nombre']) ." ". strtoupper($post['apellido1']) . " ".  
                        strtoupper($post['apellido2']); ?></a></h2>
                        <p class="fecha"><?php echo $post['cedula']; ?></p>
                        <div class="thumb">
                            <a href="../menu.php">
                                <img src="<?php echo RUTA; ?>/imagenes/paciente.png ?>" alt="">
                            </a>
                        </div>
                        <p class="extracto">
                        GÉNERO: <?php echo strtoupper($post['genero']);?><br>
                        FECHA DE NACIMIENTO: <?php echo strtoupper(fecha($post['fecha_nac']));?><br>
                        NOMBRE DEL PADRE: <?php echo strtoupper($post['padre']);?><br>
                        NOMBRE DE LA MADRE: <?php echo strtoupper($post['madre']);?><br>
                        DIRECCION: <?php echo strtoupper($post['direccion']);?><br>
                        TELEFONOS: <?php echo $post['telefono'] . " / " . $post['telefono2'];?><br>
                        EMAIL: <?php echo $post['email'];?><br>
                        </p>
                        <a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Revisar Consultas</a>
                    </article>
                </div>
            <?php endforeach; ?>
         <p style="clear: left;"></p>
        <?php require 'paginacion.php'; ?>
    </div>
</body>
</html>