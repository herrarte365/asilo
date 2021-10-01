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

    $internosLista = getListadoInternos();
    //print_r($internosLista);
?>

<section class="home-section p-2">   

    <header>
        <nav class="navbar navbar-dark bg-info shadow rounded">
            <div class="container-fluid">
                <a class="navbar-brand" href="../dashboard.php">Listado Internos</a>
            </div>
        </nav>
    </header>

    <div class="mt-3">
        <div class="btn-group shadow" role="group" aria-label="Basic example">
            <!-- PARA QUE SOLO EL ADMIN PUEDA AGREGAR MAS INTERNOS -->
            <?php if($_SESSION['id_rol'] == '1'){ ?>
                <button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Agregar Interno
                </button>
            <?php } ?>
        </div>
    </div>
    
    <div class="mt-3 p-4 bg-white shadow rounded">
        <table id="tablas" class="table table-hover"  style="width: 100%">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>ESTADO</th>
                        <th>FECHA DE NACIMIENTO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($internosLista as $interno){ ?>
                    <tr>
                        <td><?php echo $interno['id_ficha_interno'] ?></td>
                        <td><?php echo $interno['nombres'] ?></td>
                        <td><?php echo $interno['apellidos'] ?></td>
                        <td><?php echo $interno['estado_interno'] ?></td>
                        <td><?php echo  date("d-m-Y", strtotime($interno['fecha_nacimiento'])) ?></td>
                        <td>
                            <a href="ficha-interno.php?id=<?php echo $interno['id_ficha_interno'] ?>">
                                <button class="btn btn-info text-white btn-sm">Ficha de Interno</button>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
        </table>
    </div>
</section>


<!-- AGREGAMOS EL MODAL PARA REGISTRAR NUEVO INTERNO -->
<?php require_once (VIEW_PATH.'components/modal.php'); ?>

<!-- AGREGAMOS EL FOOTER DE LA PAGINA -->
<?php require_once (VIEW_PATH.'components/footer.php'); ?>