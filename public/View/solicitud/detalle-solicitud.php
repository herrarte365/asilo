<!-- AGREGAMOS EL HEADER Y EL MENU A LA PAGINA -->
<?php 

    session_start();
    
    if(!isset($_SESSION['usuario'])){
        header('Location: ../login/login.php');
    }

    require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    require_once (VIEW_PATH.'components/header.php');
    require_once (VIEW_PATH.'components/menu.php');
    require_once (CONTROLLER_PATH.'solicitudController.php');
    require_once (CONTROLLER_PATH.'SolicitudController.php');

    $enfermeros     = getEnfermeros();
    $especialidades = getEspecialidades();
    $solicitud      = getSolicitud($_GET['id']);
    $especialistas  = getEspecialistas();
?>

<section class="home-section p-2">   

    <header>
        <nav class="navbar navbar-dark bg-info shadow rounded">
            <div class="p-2">
                <a class="navbar-brand">Detalles de Solicitud de Visita Medica</a>
            </div>
        </nav>
    </header>

    <div class="mt-3">
        <div class="container-fluid" role="group" aria-label="Basic example">
            <?php 
                switch($_SESSION['id_rol']){ 
                    case "3":
                        echo '
                        <div class="row row-cols-auto">
                            <div class="col">
                                <button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="modal" data-bs-target="#asignarFechaVisita">
                                    ACEPTAR SOLICITUD
                                </button>
                            </div>
                            <div class="col">
                                <form method="POST" id="negarVisita">
                                    <input type="hidden" name="operacion" value="4">
                                    <input type="hidden" name="id_cita_medica" value="'.$solicitud[0]['id_cita_medica'].'">
                                    <button type="button" id="btnNegarVisita" class="btn btn-danger text-white btn-sm">
                                        RECHAZAR SOLICITUD
                                    </button>
                                </form>
                            </div>
                        </div>';  
                        break;
                    case "5":
                        echo '
                            <button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="modal" data-bs-target="#solicitudVisitaMedica">
                                ACTUALIZAR SOLICITUD
                            </button>';                        
                        break;
                }
            ?>
        </div>
    </div>
    
    <div class="mt-3 p-4 bg-white shadow rounded">
        <div class="jumbotron">
            <h1 class="display-6">DETALLES</h1>
            <div class="row">
                <div class="col">

                    <p class="lead">
                        <DL>
                            <DT>
                                NO. SOLICITUD
                            </DT>
                            <DD>
                                <?php echo $solicitud[0]['id_cita_medica'] ?>
                            </DD>
                            <DT>
                                PACIENTE
                            </DT>
                            <DD>
                                <?php echo utf8_encode($solicitud[0]['nombres'] . ' ' . $solicitud[0]['apellidos']) ?>
                            </DD>
                            <DT>
                                FECHA DE SOLICITUD
                            </DT>
                            <DD>
                                <?php echo $solicitud[0]['fecha_solicitud'] ?>
                            </DD>
                            <DT>
                                FECHA DE VISITA
                            </DT>
                            <DD>
                                <?php echo isset($solicitud[0]['fecha_visita']) ? $solicitud[0]['fecha_visita'] : "Pendiente de Asignar" ?>
                            </DD>
                            <DT>
                                MOTIVO DE VISITA
                            </DT>
                            <DD>
                                <?php echo $solicitud[0]['motivo_visita'] ?>
                            </DD>
                            <DT>
                                DIAGNOSTICO
                            </DT>
                            <DD>
                                <?php echo isset($solicitud[0]['diagnostico']) ? $solicitud[0]['diagnostico'] : "No hay un Diagnostico" ?>
                            </DD>
                        </DL>
                    </p>
                </div>
                <div class="col">
                <p class="lead">
                        <DL>
                            <DT>
                                OBSERVACIONES MEDICAS
                            </DT>
                            <DD>
                                <?php 
                                    echo isset($solicitud[0]['observaciones_medicas']) 
                                        ? $solicitud[0]['observaciones_medicas'] 
                                        : "No hay Observaciones" 
                                ?>
                            </DD>
                            <DT>
                                ESTADO
                            </DT>
                            <DD>
                                <?php echo $solicitud[0]['estado'] ?>
                            </DD>
                            <DT>
                                ESPECIALIDAD
                            </DT>
                            <DD>
                                <?php echo utf8_encode($solicitud[0]['nombre_especialidad']) ?>
                            </DD>
                            <DT>
                                ENFERMERO
                            </DT>
                            <DD>
                                <?php echo $solicitud[0]['nombre_enfermero'] ?>
                            </DD>
                            <DT>
                                MEDICO ESPECIALISTA
                            </DT>
                            <DD>
                                <?php echo isset($solicitud[0]['nombre']) ? $solicitud[0]['nombre'] : "No asignado" ?>
                            </DD>
                        </DL>
                    </p>
                </div>
            </div>
        </div>
    </div>

</section>


<!-- AGREGAMOS EL MODAL PARA REGISTRAR NUEVO INTERNO -->
<?php 
    switch($_SESSION['id_rol']){
        case "3":
            require_once (VIEW_PATH.'components/form-fecha-visita.php'); 
            break;
        case "5": 
            require_once (VIEW_PATH.'components/form-solicitud.php'); 
            break;
    }
?>

<!-- AGREGAMOS EL FOOTER DE LA PAGINA -->
<?php require_once (VIEW_PATH.'components/footer.php'); ?>