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
    require_once (CONTROLLER_PATH.'ExamenController.php');
    require_once (CONTROLLER_PATH.'medicamentoController.php');

    $enfermeros                   = getEnfermeros();
    $especialidades               = getEspecialidades();
    $solicitud                    = getSolicitud($_GET['id']);
    $especialistas                = getEspecialistas();
    $examenes                     = getExamenes();
    $examenesSolicitadosPaciente  = getExamenesSolicitadosPaciente($_GET['id']);
    $medicinasSolicitadasPaciente = getMedicinasSolicitadasPaciente($_GET['id']);
    //print_r($medicinasSolicitadasPaciente);
?>

<section class="home-section p-2">   

    <header>
        <nav class="navbar navbar-dark bg-info shadow rounded">
            <div class="p-2">
                <a class="navbar-brand">Detalles de la Receta</a>
            </div>
        </nav>
    </header>

    <div class="mt-3">
        <div class="container-fluid" role="group" aria-label="Basic example">
            
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
                                NO. CITA MEDICA
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
                                FECHA DE VISITA
                            </DT>
                            <DD>
                                <?php echo isset($solicitud[0]['fecha_visita']) ? $solicitud[0]['fecha_visita'] : "Pendiente de Asignar" ?>
                            </DD>
                        </DL>
                    </p>
                </div>
                <div class="col">
                <p class="lead">
                        <DL>
                            <DT>
                                ENFERMERO ACOMPAÑANTE
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

    <div class="mt-3 p-4 bg-white shadow rounded">
        <div class="jumbotron">
            <h1 class="display-6">RECETA</h1>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Medicamento</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Tiempo de Aplicación</th>
                    <th scope="col">Indicaciones</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($medicinasSolicitadasPaciente as $key => $medicamento){ ?>
                        <tr>
                            <td scope="row"><?php echo ($key+1)                          ?>         </td>
                            <td scope="row"><?php echo $medicamento['nombre_medicina']   ?>         </td>
                            <td scope="row"><?php echo $medicamento['cantidad']          ?>         </td>
                            <td scope="row"><?php echo $medicamento['tiempo_aplicacion'] ?>         </td>
                            <td scope="row"><?php echo $medicamento['indicaciones']      ?>         </td>
                            <td scope="row"><?php echo $medicamento['estado_medicina']   ?>         </td>
                            <td scope="row">
                                <a href="../../../Controller/FarmaciaController.php?id_dcm=<?php echo $medicamento['id_detalle_cita_medicamento'] ?>&operacion=1&id_cm=<?php echo $medicamento['cita_medica_id_cita_medica'] ?>"> 
                                    Entregar 
                                </a>
                                -
                                <a href="../../../Controller/FarmaciaController.php?id_dcm=<?php echo $medicamento['id_detalle_cita_medicamento'] ?>&operacion=2&id_cm=<?php echo $medicamento['cita_medica_id_cita_medica'] ?>"> 
                                    No Hay 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>


<!-- AGREGAMOS EL MODAL PARA REGISTRAR NUEVO INTERNO -->
<?php 
    switch($_SESSION['id_rol']){
        case "3":
            require_once (VIEW_PATH.'components/form-fecha-visita.php'); 
            break;
        case "4":
            require_once (VIEW_PATH.'components/form-examen.php');
            require_once (VIEW_PATH.'components/form-diagnostico.php');
            require_once (VIEW_PATH.'components/form-medicina.php');
            break;
        case "5": 
            require_once (VIEW_PATH.'components/form-solicitud.php'); 
            break;
    }
?>

<!-- AGREGAMOS EL FOOTER DE LA PAGINA -->
<?php require_once (VIEW_PATH.'components/footer.php'); ?>