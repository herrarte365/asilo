<!-- AGREGAMOS EL HEADER Y EL MENU A LA PAGINA -->
<?php 

    session_start();
    
    if(!isset($_SESSION['usuario'])){
        header('Location: ../login/login.php');
    }

    require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    require_once (VIEW_PATH.'components/header.php');
    require_once (VIEW_PATH.'components/menu.php');
    require_once (CONTROLLER_PATH.'ExamenController.php');

    $detalleExamen  = getExamen($_GET['id']);
    //print_r($medicinasSolicitadasPaciente);
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
            <div class="row row-cols-auto">
                <div class="col">
                    <button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="modal" data-bs-target="#registrarResultadoExamen">
                        REGISTRAR RESULTADO
                    </button>
                </div>
            </div>
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
                                NO. SOLICITUD DE EXAMEN
                            </DT>
                            <DD>
                                <?php echo $detalleExamen[0]['id_detalle_cita_examen'] ?>
                            </DD>
                            <DT>
                                PACIENTE
                            </DT>
                            <DD>
                                <?php echo utf8_encode($detalleExamen[0]['nombres'] . ' ' . $detalleExamen[0]['apellidos']) ?>
                            </DD>
                            <DT>
                                EXAMEN
                            </DT>
                            <DD>
                                <?php echo $detalleExamen[0]['nombre_examen'] ?>
                            </DD>
                            <DT>
                                DESCRIPCION DEL EXAMEN
                            </DT>
                            <DD>
                                <?php echo $detalleExamen[0]['descripcion'] ?>
                            </DD>
                            <DT>
                                PRECIO
                            </DT>
                            <DD>
                                <?php echo $detalleExamen[0]['precio'] ?>
                            </DD>
                        </DL>
                    </p>
                </div>
                <div class="col">
                <p class="lead">
                        <DL>
                            <DT>
                                RESULTADO
                            </DT>
                            <DD>
                                <?php 
                                    echo isset($detalleExamen[0]['resultado']) 
                                        ? $detalleExamen[0]['resultado'] 
                                        : "No hay un resultado registrado" 
                                ?>
                            </DD>
                            <DT>
                                ESTADO
                            </DT>
                            <DD>
                                <?php echo $detalleExamen[0]['estado'] ?>
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
    require_once (VIEW_PATH.'components/form-resultado-examen.php'); 
?>

<!-- AGREGAMOS EL FOOTER DE LA PAGINA -->
<?php require_once (VIEW_PATH.'components/footer.php'); ?>