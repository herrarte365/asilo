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
            case "3":
                asignarFechaSolicitud();
                break;
            case "4":
                rechazarSolicitud();
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
        $especialidades = $consulta->listadoEspecialidad();
        return $especialidades;
    }

    function getEspecialistas()
    {
        $consulta = new Solicitud();
        $especialistas = $consulta->listadoEspecialista();
        return $especialistas;
    }

    function asignarFechaSolicitud()
    {
        try{
            $fecha = $_POST['fecha_visita'];
            $hora = $_POST['hora_visita'];
            $especialista = $_POST['especialista'];
            $cita_medica_id = $_POST['id_cita_medica'];

            $consulta = new Solicitud();
            $resultado = $consulta->insertarFechaSolicitud($fecha, $hora, $especialista, $cita_medica_id);
            
            if($resultado == 1){
                header('Location: ../public/View/solicitud/detalle-solicitud.php?id='. $cita_medica_id);
            }

        }catch(PDOException $e){
            return $e;
        }
    }

    function rechazarSolicitud()
    {
        try{
            $id_cita_medica = $_POST['id_cita_medica'];

            $consulta = new Solicitud();
            $resultado = $consulta->rechazarCitaSolicitud($id_cita_medica);
            return $resultado;
        }catch(Exception $e){
            return $e;
        }

    }


?>