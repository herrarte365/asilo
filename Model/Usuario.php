<?php

    // ESTE ES PARA ACCEDER AL ARCHIVO DE RUTAS
    require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    require_once (CONFIG_PATH.'conexion.php');

    Class Usuario extends Conexion{

        private $con; 

        public function __construct() 
        {
            $this->con = new Conexion();
            $this->con = $this->con->connect();
        }

        // CON ESTA FUNCION SE VERIFICAN LOS DATOS DEL USUARIO PARA INICIAR SESIÓN
        public function iniciarSesion($usuario, $password)
        {
            //CONSULTA
            $sql = "SELECT * FROM usuario WHERE usuario = '". $usuario ."' and password = '". $password ."'";
            $execute = $this->con->query($sql);
            $execute->fetchall(PDO::FETCH_ASSOC);

            //VER SI DEVOLVIO RESULTADOS
            $cuenta = $execute->rowCount();

            if($cuenta > 0){
                return true;
            }else{
                return false;
            }

        }

        // CON ESTA FUNCION SE TRAE EL REGISTRO DE UN USUARIO ESPECIFICO 
        public function traerUsuario($usuario, $password)
        {
            $sql = "SELECT * FROM usuario 
                    INNER JOIN rol ON usuario.rol_id_rol = rol.id_rol
                    WHERE usuario = '". $usuario ."' and password = '". $password ."'";

            $execute = $this->con->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);

            return $request;

        }

    }

?>