<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
require_once (CONFIG_PATH.'conexion.php');

Class Farmacia extends Conexion{

    private $con; 

    public function __construct() 
    {
        $this->con = new Conexion();
        $this->con = $this->con->connect();
    }

    
    // CONSULTAR LISTADO DE RECETAS SOLICITADAS
    public function consultarListado()
    {
        $sql = "SELECT cm.id_cita_medica, fi.nombres, fi.apellidos, cm.fecha_visita FROM detalle_cita_medicamento AS dcm
                LEFT JOIN cita_medica AS cm ON dcm.cita_medica_id_cita_medica = cm.id_cita_medica
                INNER JOIN ficha_interno AS fi ON cm.ficha_interno_id_ficha_interno = fi.id_ficha_interno
                GROUP BY  cm.id_cita_medica, fi.nombres, fi.apellidos";

        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function entregarMedicinaPaciente($id_detalle_cita_medicamento)
    {
        $entregado = "entregado";
        try{

            $sql = "UPDATE detalle_cita_medicamento SET estado_medicina = '" . $entregado . "'
                    WHERE id_detalle_cita_medicamento = " . $id_detalle_cita_medicamento;
            
            $query = $this->con->prepare($sql);
            $query->execute();

            echo 1;

        }catch(PDOException $e){
            echo $e;
        }
    }

    public function noHayMedicina($id_detalle_cita_medicamento)
    {
        $entregado = "No entregado";
        try{

            $sql = "UPDATE detalle_cita_medicamento SET estado_medicina = '" . $entregado . "'
                    WHERE id_detalle_cita_medicamento = " . $id_detalle_cita_medicamento;
            
            $query = $this->con->prepare($sql);
            $query->execute();

            echo 1;

        }catch(PDOException $e){
            echo $e;
        }
    }



}

?>