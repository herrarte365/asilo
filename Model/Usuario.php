<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
require_once (CONFIG_PATH.'conexion.php');

Class Usuario extends Conexion{

    private $con; 

    public function __construct() 
    {
        $this->con = new Conexion();
        $this->con = $this->con->connect();
    }

    public function iniciarSesion($usuario, $password){
        $sql = "SELECT * FROM usuario WHERE usuario = '". $usuario ."' and password = '". $password ."'";
        $execute = $this->con->query($sql);
        $execute->fetchall(PDO::FETCH_ASSOC);

        $cuenta = $execute->rowCount();

        if($cuenta > 0){
            return true;
        }else{
            return false;
        }

    }

    public function traerUsuario($usuario, $password){
        $sql = "SELECT * FROM usuario 
                INNER JOIN rol ON usuario.rol_id_rol = rol.id_rol
                WHERE usuario = '". $usuario ."' and password = '". $password ."'";
        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);

        return $request;

    }


}

?>