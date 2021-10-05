<?php

    require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    require_once (MODEL_PATH.'Farmacia.php');

    if(isset($_POST['operacion']) || isset($_GET['operacion'])){

        $dato = "";

        if(isset($_GET['operacion'])){
            $dato = $_GET['operacion'];
        }else{
            $dato = $_POST['operacion'];
        }

        switch($dato)
        {
            case "1": 
                entregarMedicamento();
                break;
            case "2":
                noHayMedicamento();
                break;
        }
    }

    // EXTRAER LISTADO DE SOLICITUDES DE MEDICINA
    function getSolicitudesMedicina()
    {        
        $consulta = new Farmacia();
        $examenes = $consulta->consultarListado();
        return $examenes;
    }

        // ESTA FUNCION ES PARA QUITAR UN MEDICAMENTO ASIGNADO A UN PACIENTE EN UNA CITA. 
    function entregarMedicamento(){
        try{
            $id_detalle_cita_medicamento = $_GET['id_dcm'];

            $consulta = new Farmacia();
            $consulta->entregarMedicinaPaciente($id_detalle_cita_medicamento);

            header('Location: /public/View/farmacia/detalle-receta.php?id=' . $_GET['id_cm']);
            
        }catch(PDOException $e){
            return $e;
        }
    }  

    // ESTA FUNCION ES PARA QUITAR UN MEDICAMENTO ASIGNADO A UN PACIENTE EN UNA CITA. 
    function noHayMedicamento(){
        try{
            $id_detalle_cita_medicamento = $_GET['id_dcm'];

            $consulta = new Farmacia();
            $consulta->noHayMedicina($id_detalle_cita_medicamento);

            header('Location: /public/View/farmacia/detalle-receta.php?id=' . $_GET['id_cm']);
            
        }catch(PDOException $e){
            return $e;
        }
    }  

?>