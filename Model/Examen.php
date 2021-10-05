<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
require_once (CONFIG_PATH.'conexion.php');

Class Examen extends Conexion{

    private $con; 

    public function __construct() 
    {
        $this->con = new Conexion();
        $this->con = $this->con->connect();
    }

    
    // CONSULTAR LISTADO DE EXAMENES DISPONIBLES
    public function consultarListado()
    {
        $sql = "SELECT * FROM examen";
        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    // CONSULTAR LISTADO DE EXAMENES DISPONIBLES
    public function consultarExamen($id)
    {
        $sql = "SELECT detalle_cita_examen.*, ficha_interno.nombres, ficha_interno.apellidos, examen.nombre_examen, examen.descripcion FROM detalle_cita_examen
                INNER JOIN examen ON detalle_cita_examen.examen_id_examen = examen.id_examen
                INNER JOIN cita_medica ON detalle_cita_examen.cita_medica_id_cita_medica = cita_medica.id_cita_medica
                INNER JOIN ficha_interno ON cita_medica.id_cita_medica = ficha_interno.id_ficha_interno
                WHERE detalle_cita_examen.id_detalle_cita_examen = " . $id;
        
        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function listadoExamenesSolicitadosPaciente($id_cita_medica)
    {
        $sql = "SELECT detalle_cita_examen.*, examen.nombre_examen FROM detalle_cita_examen
                INNER JOIN examen ON detalle_cita_examen.examen_id_examen = examen.id_examen
                WHERE detalle_cita_examen.cita_medica_id_cita_medica = " . $id_cita_medica;
                
        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function listadoExamenesSolicitados()
    {
        $sql = "SELECT detalle_cita_examen.*, ficha_interno.nombres, ficha_interno.apellidos, examen.nombre_examen FROM detalle_cita_examen
                INNER JOIN examen ON detalle_cita_examen.examen_id_examen = examen.id_examen
                INNER JOIN cita_medica ON detalle_cita_examen.cita_medica_id_cita_medica = cita_medica.id_cita_medica
                INNER JOIN ficha_interno ON cita_medica.id_cita_medica = ficha_interno.id_ficha_interno";
                
        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function insertarExamen($id_cita_medica, $id_examen)
    {
        try{

            $sql = "SELECT precio FROM examen WHERE id_examen = " . $id_examen;
            
            $execute = $this->con->query($sql);
            $precio = $execute->fetchall(PDO::FETCH_ASSOC);

            $sql_encargado = "INSERT INTO detalle_cita_examen (cita_medica_id_cita_medica, examen_id_examen, precio, estado) 
                                VALUES (?,?,?, 'Solicitado')";
            
            $query = $this->con->prepare($sql_encargado);
            $query->execute([$id_cita_medica, $id_examen, $precio[0]['precio']]);

            echo 1;

        }catch(Exception $e){
            echo $e;
        }
        
    }

    public function insertarResultadoExamen($id_examen, $resultado){
        try{

            $sql = "UPDATE detalle_cita_examen SET estado = 'Realizado',
            resultado = '" . $resultado . "'
            WHERE id_detalle_cita_examen = " . $id_examen;
    
            $query = $this->con->prepare($sql);
            $query->execute();

            echo 1;

        }catch(Exception $e){
            echo $e;
        }
    }

    public function quitarExamenPaciente($id_detalle_cita_examen)
    {
        try{

            $sql = "DELETE FROM detalle_cita_examen WHERE id_detalle_cita_examen = " . $id_detalle_cita_examen;
            
            $query = $this->con->prepare($sql);
            $query->execute();

            echo 1;

        }catch(PDOException $e){
            echo $e;
        }
    }

}

?>