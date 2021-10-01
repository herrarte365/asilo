<?php

    require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    require_once (MODEL_PATH.'Usuario.php');

    if($_POST['operador'] == 1){
        $usuario  = $_POST['usuario'];
        $password = $_POST['pass'];
        $clave    = md5($password); 

        $user = new Usuario();
        
        if($user->iniciarSesion($usuario, $clave)){
            
            $userData = $user->traerUsuario($usuario, $clave);

            session_start();

            $_SESSION["usuario"]=$usuario;
            $_SESSION["id_usuario"]=$userData[0]['id_usuario'];
            $_SESSION["id_rol"]=$userData[0]['rol_id_rol'];
            $_SESSION["rol_name"]=$userData[0]['nombre_rol'];
            echo 1;
        }else{
            echo 2;
        }
    }

    if($_POST['operador'] == 2){
        session_start();
        unset($_SESSION['usuario']);
        unset($_SESSION['id_usuario']);
        unset($_SESSION['id_rol']);
        unset($_SESSION['rol_name']);
        session_destroy();
        echo 1;
    }

?>