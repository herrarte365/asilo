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

    $solicitudesExamenes = getSolicitudesExamenes();
    //print_r($solicitudesMedicina);
?>

<section class="home-section p-2">   

    <header>
        <nav class="navbar navbar-dark bg-info shadow rounded">
            <div class="container-fluid">
                <a class="navbar-brand" href="../dashboard.php">Listado de Recetas</a>
            </div>
        </nav>
    </header>

    <div class="mt-3 p-4 bg-white shadow rounded">
        <div class="jumbotron">
            <h1 class="display-6">EXAMENES</h1>
            <table id="tablas" class="table table-hover"  style="width: 100%">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Examen</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Resultado</th>
                    <th scope="col">Costo</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($solicitudesExamenes as $key => $examen){ ?>
                        <tr>
                            <td scope="row"><?php echo ($key+1)                          ?></td>
                            <td scope="row"><?php echo $examen['nombres'] . ' ' . $examen['apellidos'] ?></td>
                            <td scope="row"><?php echo $examen['nombre_examen']          ?></td>
                            <td scope="row"><?php echo $examen['estado']                 ?></td>
                            <td scope="row">
                                <?php echo $examen['resultado'] == "" ? "Pendiente" : $examen['resultado'] ?>
                            </td>
                            <td scope="row"><?php echo $examen['precio']                 ?></td>
                            <td scope="row">
                                <a href="detalle-examen.php?id=<?php echo $examen['id_detalle_cita_examen'] ?>"> 
                                    <button class="btn btn-info btn-sm text-white">
                                        Detalles 
                                    </button>
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
<?php require_once (VIEW_PATH.'components/form-solicitud.php'); ?>

<!-- AGREGAMOS EL FOOTER DE LA PAGINA -->
<?php require_once (VIEW_PATH.'components/footer.php'); ?>