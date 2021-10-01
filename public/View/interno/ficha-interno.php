<!-- AGREGAMOS EL HEADER Y EL MENU A LA PAGINA -->
<?php 

    session_start();
    
    if(!isset($_SESSION['usuario'])){
        header('Location: ../login/login.php');
    }

    require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    require_once (VIEW_PATH.'components/header.php');
    require_once (VIEW_PATH.'components/menu.php');
    require_once (CONTROLLER_PATH.'InternoController.php');
    require_once (CONTROLLER_PATH.'SolicitudController.php');

    $interno        = getInterno($_GET['id']);
    $enfermeros     = getEnfermeros();
    $especialidades = getEspecialidades();
?>

<section class="home-section p-2">   

    <header>
        <nav class="navbar navbar-dark bg-info shadow rounded">
            <div class="p-2">
                <a class="navbar-brand">Ficha de Interno</a>
            </div>
        </nav>
    </header>

    <div class="mt-3">
        <div class="" role="group" aria-label="Basic example">
            <!-- PARA QUE SOLO EL ADMINISTRADOR PUEDA ACTUALIZAR AL INTERNO -->
            <?php if($_SESSION['id_rol'] == '1'){ ?>
                <button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    ACTUALIZAR INTERNO
                </button>
            <?php } ?>
            <button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="modal" data-bs-target="#solicitudVisitaMedica">
                AGREGAR VISITA MEDICA
            </button>
            <button class="btn btn-info text-white btn-sm">HISTORIAL MEDICO</button>
        </div>
    </div>
    
    <div class="mt-3 p-4 bg-white shadow rounded">
        <div class="jumbotron">
            <h1 class="display-6">Ficha de Interno</h1>
            <div class="row">
                <div class="col">

                    <p class="lead">
                        <DL>
                            <DT>
                                INTERNO
                            </DT>
                            <DD>
                                <?php echo $interno[0]['nombres'] . ' ' . $interno[0]['apellidos'] ?>
                            </DD>
                            <DT>
                                CUI
                            </DT>
                            <DD>
                                <?php echo $interno[0]['cui'] ?>
                            </DD>
                            <DT>
                                FECHA DE NACIMIENTO
                            </DT>
                            <DD>
                                <?php echo $interno[0]['fecha_nacimiento'] ?>
                            </DD>
                            <DT>
                                MEDICO PERSONAL
                            </DT>
                            <DD>
                                <?php echo $interno[0]['medico_personal'] ?>
                            </DD>
                            <DT>
                                TELEFONO DEL MEDICO 
                            </DT>
                            <DD>
                                <?php echo $interno[0]['telefono_medico'] ?>
                            </DD>
                            <DT>
                                GRUPO SANGUINEO
                            </DT>
                            <DD>
                                <?php echo $interno[0]['grupo_sanguineo'] ?>
                            </DD>
                            <DT>
                                ALERGIAS
                            </DT>
                            <DD>
                                <?php echo $interno[0]['alergias'] ?>
                            </DD>

                        </DL>
                    </p>
                </div>
                <div class="col">
                <p class="lead">
                        <DL>
                            <DT>
                                ENFERMEDADES CRONICAS
                            </DT>
                            <DD>
                                <?php echo $interno[0]['enfermedades_cronicas'] ?>
                            </DD>
                            <DT>
                                RECETA
                            </DT>
                            <DD>
                                <?php echo $interno[0]['receta_medico'] ?>
                            </DD>
                            <DT>
                                OBSERVACIONES
                            </DT>
                            <DD>
                                <?php echo $interno[0]['observaciones'] ?>
                            </DD>
                            <DT>
                                ESTADO
                            </DT>
                            <DD>
                                <?php echo $interno[0]['estado_interno'] ?>
                            </DD>
                            <DT>
                                FECHA INGRESO
                            </DT>
                            <DD>
                                <?php echo $interno[0]['fecha_ingreso'] ?>
                            </DD>
                            <DT>
                                FECHA EGRESO
                            </DT>
                            <DD>
                                <?php echo $interno[0]['fecha_egreso'] ?>
                            </DD>
                        </DL>
                    </p>
                </div>
            </div>
            <hr class="my-4">
            <p>DATOS DEL ENCARGADO</p>
            <p class="lead">
                        <DL>
                            <DT>
                                ENCARGADO
                            </DT>
                            <DD>
                                <?php echo $interno[0]['nombre'] ?>
                            </DD>
                            <DT>
                                CUI
                            </DT>
                            <DD>
                                <?php echo $interno[0]['cui_encargado'] ?>                                
                            </DD>
                            <DT>
                                TELEFONO
                            </DT>
                            <DD>
                                <?php echo $interno[0]['telefono'] ?>
                            </DD>
                            <DT>
                                DIRECCION
                            </DT>
                            <DD>
                                <?php echo $interno[0]['direccion'] ?>
                            </DD>
                            <DT>
                                ESTADO
                            </DT>
                            <DD>
                                <?php echo $interno[0]['estado_encargado'] ?>
                            </DD>
                            <DT>
                                GRUPO SANGUINEO
                            </DT>
                            <DD>
                                <?php echo $interno[0]['grupo_sanguineo'] ?>
                            </DD>
                            <DT>
                                ALERGIAS
                            </DT>
                            <DD>
                                <?php echo $interno[0]['alergias'] ?>
                            </DD>

                        </DL>
                    </p>
        </div>
    </div>

</section>


<!-- AGREGAMOS EL MODAL PARA REGISTRAR NUEVO INTERNO -->
<?php 
    require_once (VIEW_PATH.'components/modal.php'); 
    require_once (VIEW_PATH.'components/form-solicitud.php'); 
    require_once (VIEW_PATH.'components/footer.php'); 
?>
