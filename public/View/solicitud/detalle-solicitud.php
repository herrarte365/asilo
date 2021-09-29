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
    $solicitud = getSolicitud($_GET['id']);
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
        <div class="btn-group shadow" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="modal" data-bs-target="#solicitudVisitaMedica">
                ACTUALIZAR SOLICITUD
            </button>
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
                                <?php echo $solicitud[0]['nombres'] . ' ' . $solicitud[0]['apellidos'] ?>
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
                                <?php echo $solicitud[0]['nombre_especialidad'] ?>
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
<?php require_once (VIEW_PATH.'components/form-solicitud.php'); ?>

<!-- AGREGAMOS EL FOOTER DE LA PAGINA -->
<?php require_once (VIEW_PATH.'components/footer.php'); ?>