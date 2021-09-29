<?php 
    session_start();

    //ESTO VEERIFICA SI ESTA LOGUEADO PARA PERMITIR EL PASO DE LO CONTRARIO LO ENVIA AL LOGIN
    if(!isset($_SESSION['usuario'])){
      header('Location: ../View/login/login.php');
    }
    
    require_once 'components/header.php'; 
    require_once 'components/menu.php';
?>

    <section class="home-section">      
        <header class="p-2">
            <nav class="navbar navbar-dark bg-info shadow rounded">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
            </nav>
        </header>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../img/imagen1.jpg" class="d-block w-100 p-2 rounded" alt="..." >
    </div>
    <div class="carousel-item">
      <img src="../img/imagen2.jpg" class="d-block w-100 p-2" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/imagen3.jpg" class="d-block w-100 p-2" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>








    </section>

<?php require_once 'components/footer.php'; ?>