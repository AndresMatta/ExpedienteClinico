<?php require 'header.php'; ?>

<div class="contenedor">
    
    <h1>Consultas Abiertas: </h1><br>
    <?php foreach($consultas as $post): ?>
        <div class="izquierda post2">
            <article>
            <h2 class="titulo">
                        <a href="<?php if($post['concluida']=='pendiente'): ?>
                        consulta.php?id=<?php echo $post['id_consulta']; ?>
                        <?php endif ?>
                        <?php if ($post['concluida']=='guardada'): ?> 
                        guardada.php?id=<?php echo $post['id_consulta']; ?>
                        <?php endif ?>"><?php echo strtr(strtoupper($post['nombre']), "áéíóú", "ÁÉÍÓÚ");?>
                        </a></h2>

                        <p class="fecha"><?php echo $post['cedula_paciente']; ?></p>
                        <div class="thumb">

                        <a href="<?php if($post['concluida']=='pendiente'): ?>
                        consulta.php?id=<?php echo $post['id_consulta']; ?>
                        <?php endif ?>
                        <?php if ($post['concluida']=='guardada'): ?> 
                        guardada.php?id=<?php echo $post['id_consulta']; ?>
                        <?php endif ?>">
                        <img src="<?php echo RUTA; ?>/imagenes/medicina.png" alt="">
                        </a>
                        
                        </div>
                        <p class="extracto">NOMBRE DEL PACIENTE: <?php echo strtr(strtoupper($post['nombre']), "áéíóú", "ÁÉÍÓÚ");?><br>
                        CONSULTA: <?php echo strtoupper($post['concluida']);?></p>
                        <a href="<?php if($post['concluida']=='pendiente'): ?>
                        consulta.php?id=<?php echo $post['id_consulta']; ?>
                        <?php endif ?>
                        <?php if ($post['concluida']=='guardada'): ?> 
                        guardada.php?id=<?php echo $post['id_consulta']; ?>
                        <?php endif ?>" class="continuar">Continuar Consulta</a>
                </article>
        </div>

    <?php endforeach; ?>
    <p style="clear: left;"></p>
    <?php require 'paginacion.php'; ?>
    </div>
</body>
</html>