<?php

    require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    require_once (MODEL_PATH.'Medicamento.php');

    if(isset($_POST['operacion']) || isset($_GET['operacion'])){

        
        if(isset($_GET['operacion'])){
            $dato = "2";
        }else{
            $dato = $_POST['operacion'];
        }

        switch($dato)
        {
            case "1": 
                setMedicamento();
                break;
            case "2":
                quitarMedicamento();
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
        $medicinasSolicitadas = $consulta->listadoMedicamentosSolicitadosPaciente($id_cita_medica);
        return $medicinasSolicitadas;
    }

    // ESTA FUNCION ES PARA QUITAR UN MEDICAMENTO ASIGNADO A UN PACIENTE EN UNA CITA. 
    function quitarMedicamento(){
        try{
            $id_detalle_cita_medicamento = $_GET['id_detalle_cita_medicamento'];

            $consulta = new Medicamento();
            $consulta->quitarMedicinaPaciente($id_detalle_cita_medicamento);

            header('Location: /public/View/solicitud/detalle-solicitud.php?id=' . $_GET['id']);
            
        }catch(PDOException $e){
            return $e;
        }
    }   

?>