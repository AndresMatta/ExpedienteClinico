<?php require 'header.php'; ?>

    <div class="contenedor">
         <div class="post">
            <article>
                <h2 class="titulo"><a href="abrirConsulta.php">Recepción <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></h2>
                        <div class="thumb">
                            <a href="abrirConsulta.php">
                                <img src="<?php echo RUTA; ?>/imagenes/3.png" alt="">
                            </a>
                        </div>
                        <p class="extracto">Recopilar los datos del paciente para así iniciar una nueva consulta</p>
                        <a href="abrirConsulta.php" class="continuar">Iniciar una nueva consulta</a>
            </article>
        </div>
        <div class="post">
            <article>
                <h2 class="titulo"><a href="pendientes.php">Atención Médica <i class="fa fa-stethoscope" aria-hidden="true"></i></a></h2>
                        <div class="thumb">
                            <a href="#">
                                <img src="<?php echo RUTA; ?>/imagenes/1.png" alt="">
                            </a>
                        </div>
                        <p class="extracto">Aquí el médico verificará las consultas pendientes</p>
                        <a href="#" class="continuar">Atender las consultas pendientes</a>
            </article>
                </div>
    </div>

<?php require 'footer.php'; ?>