<?php

    require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    require_once (MODEL_PATH.'Medicamento.php');

    if(isset($_POST['operacion'])){
        switch($_POST['operacion'])
        {
            case "1": 
                setMedicamento();
                break;
        }
    }

    // ASIGNAR UNA MEDICINA 
    function setMedicamento()
    {
        try{
            $id_cita_medica     = $_POST['id_cita_medica'];
            $nombre_medicina = $_POST['nombre_medicina'];
            $cantidad           = $_POST['cantidad'];
            $tiempo_aplicacion  = $_POST['tiempo_aplicacion'];
            $indicaciones       = $_POST['indicaciones'];

            $consulta = new Medicamento();
            return $resultado = $consulta->insertarMedicina($id_cita_medica, $nombre_medicina, $cantidad, $tiempo_aplicacion, $indicaciones);
            
        }catch(PDOException $e){
            return $e;
        }
    }

    function getMedicinasSolicitadasPaciente($id_cita_medica){
        $consulta = new Medicamento();
        $medicinasSolicitadas = $consulta->listadoExamenesSolicitadosPaciente($id_cita_medica);
        return $medicinasSolicitadas;
    }

?>