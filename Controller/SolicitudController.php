<?php

    require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    require_once (MODEL_PATH.'Solicitud.php');

    if(isset($_POST['operacion'])){
        switch($_POST['operacion'])
        {
            case "1": 
                setSolicitud();
                break;
            case "2":
                updateSolicitud();
                break;
        }
    }

    //TRAER UNA SOLICITUD ESPECIFICA
    function getSolicitud($id)
    {
        $consulta = new Solicitud();
        $solicitud = $consulta->consultarSolicitud($id);
        return $solicitud;
    }


    // EXTRAER LISTADO DE INTERNOS
    function getListadoSolicitudes()
    {        
        $consulta = new Solicitud();
        $solicitudes = $consulta->consultarListado();
        return $solicitudes;
    }

    // AGREGAR NUEVO INTERNO 
    function setSolicitud()
    {
        try{
            $motivo_visita = $_POST['motivo_visita'];
            $enfermero = $_POST['enfermero'];
            $especialidad = $_POST['especialidad'];
            $interno = $_POST['id_ficha_interno'];

            $consulta = new Solicitud();
            return $consulta->insertarSolicitud($motivo_visita, $enfermero, $especialidad, $interno);
            
        }catch(PDOException $e){
            return $e;
        }

    }

    function updateSolicitud()
    {
        try{
            $motivo_visita  = $_POST['motivo_visita'];
            $enfermero      = $_POST['enfermero'];
            $especialidad   = $_POST['especialidad'];
            $id_cita_medica = $_POST['id_cita_medica'];

            $consulta = new Solicitud();
            return $consulta->actualizarSolicitud($motivo_visita, $enfermero, $especialidad, $id_cita_medica);
            
        }catch(PDOException $e){
            return $e;
        }
    }

    function getEnfermeros()
    {
        $consulta = new Solicitud();
        $enfermeros = $consulta->listadoEnfermero();
        return $enfermeros;
    }

    function getEspecialidades()
    {
        $consulta = new Solicitud();
        $solicitudes = $consulta->listadoEspecialidad();
        return $solicitudes;
    }


?>