<div class="sidebar">
  <div class="logo-details">
    <i class='bx bx-home icon'></i>
      <div class="logo_name">NuevaVida</div>
    <i class='bx bx-menu' id="btn" ></i>
  </div>
    
  <ul class="nav-list">

    <li>
      <a href="/public/View/dashboard.php">
        <i class='bx bx-grid-alt'></i>
        <span class="links_name">Dashboard</span>
      </a>
      <span class="tooltip">Dashboard</span>
    </li>

    <!-- SOLO PARA EL ADMINISTRADOR DEL ASILO -->
    <?php if($_SESSION['id_rol'] == '1'){ ?>

      <li>
        <a href="#">
        <i class='bx bx-smile' ></i>
          <span class="links_name">Encargados</span>
        </a>
        <span class="tooltip">Encargados</span>
      </li>
      
      <li>
        <a href="#">
        <i class='bx bxs-report'></i>
          <span class="links_name">Reportes</span>
        </a>
        <span class="tooltip">Reportes</span>
      </li>

      <li>
        <a href="#">
        <i class='bx bx-dollar-circle'></i>
          <span class="links_name">Caja</span>
        </a>
        <span class="tooltip">Caja</span>
      </li>

    <?php } ?>
      

    <!-- EL LISTADO DE INTERNOS SE MUESTRA PARA ADMINISTRADOR DEL ASILO COMO PARA MEDICO LOCAL DEL MISMO -->
    <?php if($_SESSION['id_rol'] == '1' || $_SESSION['id_rol'] == '5'){ ?>

      <li>
        <a href="/public/View/interno/listado-internos.php">
          <i class='bx bx-user' ></i>
          <span class="links_name">Internos</span>
        </a>
        <span class="tooltip">Internos</span>
      </li>

    <?php } ?>
     
    <!-- MOSTRAR LAS OPCIONES PARA EL MEDICO GENERAL LOCAL -->
    <?php if($_SESSION['id_rol'] == '5' || $_SESSION['id_rol'] == '3'){ ?>

      <li>
        <a href="/public/View/solicitud/listado-solicitudes.php">
          <i class='bx bx-mail-send' ></i>
          <span class="links_name">Solicitudes</span>
        </a>
        <span class="tooltip">Solicitudes</span>
      </li>
    
    <?php } ?>

    <!-- MOSTRAR LAS OPCIONES PARA EL MEDICO ESPECIALISTA -->
    <?php if($_SESSION['id_rol'] == '4'){ ?>

      <li>
        <a href="/public/View/especialista/agenda-medica.php">
          <i class='bx bx-notepad'></i>
          <span class="links_name">Agenda Medica</span>
        </a>
        <span class="tooltip">Agenda Medica</span>
      </li>

    <?php } ?>
    
    
    <?php if($_SESSION['id_rol'] == '7'){ ?>

      <li>
        <a href="/public/View/laboratorio/listado-examenes.php">
          <i class='bx bx-folder' ></i>
          <span class="links_name">Examenes</span>
        </a>
        <span class="tooltip">Examenes</span>
      </li>

    <?php } ?>
     
    <!-- RUTAS PARA EL ENCARGADO DE LA FARMACIA -->
    <?php if($_SESSION['id_rol'] == '6'){ ?>

      <li>
        <a href="/public/View/farmacia/listado-recetas.php">
          <i class='bx bx-cart-alt' ></i>
          <span class="links_name">Farmacia</span>
        </a>
        <span class="tooltip">Farmacia</span>
      </li>
    
    <?php } ?>
    
    <li class="profile">
        <div class="profile-details">
          <i class='bx bxs-user-circle bx-md'></i>
          <div class="name_job">
            <div class="name"><?php echo $_SESSION['usuario']; ?></div>
            <div class="job"><?php echo utf8_encode($_SESSION['rol_name']) ?></div>
          </div>
        </div>
        <i class='bx bx-log-out' id="log_out"></i>
    </li>
  </ul>
</div>