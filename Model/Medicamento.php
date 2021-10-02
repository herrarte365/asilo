<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
require_once (CONFIG_PATH.'conexion.php');

Class Medicamento extends Conexion{

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

    public function listadoMedicamentosSolicitadosPaciente($id_cita_medica)
    {   //poner el where en examen
        $sql = "SELECT * FROM detalle_cita_medicamento WHERE cita_medica_id_cita_medica = " . $id_cita_medica;
                
        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function quitarMedicinaPaciente($id_detalle_cita_medicamento)
    {
        try{

            $sql = "DELETE FROM detalle_cita_medicamento WHERE id_detalle_cita_medicamento = " . $id_detalle_cita_medicamento;
            
            $query = $this->con->prepare($sql);
            $query->execute();

            echo 1;

        }catch(PDOException $e){
            echo $e;
        }
    }

    public function insertarMedicina($id_cita_medica, $nombre_medicina, $cantidad, $tiempo_aplicacion, $indicaciones)
    {
        try{

            $sql_encargado = "INSERT INTO detalle_cita_medicamento 
                                (cantidad, tiempo_aplicacion, indicaciones, estado_medicina, nombre_medicina, cita_medica_id_cita_medica) 
                                VALUES (?,?,?, 'Solicitado', ?, ?)";
            
            $query = $this->con->prepare($sql_encargado);
            $query->execute([$cantidad, $tiempo_aplicacion, $indicaciones, $nombre_medicina, $id_cita_medica]);

            echo 1;

        }catch(Exception $e){
            echo $e;
        }
        
    }

}

?>