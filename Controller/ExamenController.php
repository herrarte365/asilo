<?php

    require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    require_once (MODEL_PATH.'Examen.php');

    if(isset($_POST['operacion']) || isset($_GET['operacion'])){

        
        if(isset($_GET['operacion'])){
            $dato = "2";
        }else{
            $dato = $_POST['operacion'];
        }

        switch($dato)
        {
            case "1": 
                setExamen();
                break;
            case "2":
                quitarExamen();
                break;
            case "3":
                registrarResultado();
                break;
        }
    }

    //TRAER UN EXAMEN ESPECIFICO
    function getExamen($id)
    {
        $consulta = new Examen();
        $examen = $consulta->consultarExamen($id);
        return $examen;
    }

    function getExamenesSolicitadosPaciente($id_cita_medica){
        $consulta = new Examen();
        $examenesSolicitados = $consulta->listadoExamenesSolicitadosPaciente($id_cita_medica);
        return $examenesSolicitados;
    }


    // TRAE TODOS LOS EXAMENES
    function getSolicitudesExamenes(){
        $consulta = new Examen();
        $examenesSolicitados = $consulta->listadoExamenesSolicitados();
        return $examenesSolicitados;
    }

    // EXTRAER LISTADO DE EXAMENES
    function getExamenes()
    {        
        $consulta = new Examen();
        $examenes = $consulta->consultarListado();
        return $examenes;
    }

    // SOLICITAR NUEVO EXAMEN 
    function setExamen()
    {
        try{
            $id_cita_medica = $_POST['id_cita_medica'];
            $id_examen      = $_POST['id_examen'];

            $consulta = new Examen();
            return $resultado = $consulta->insertarExamen($id_cita_medica, $id_examen);
            
        }catch(PDOException $e){
            return $e;
        }

    }

    // AGREGAR RESULTADO AL EXAMEN
    function registrarResultado()
    {
        try{
            $id_detalle_cita_examen = $_POST['id_detalle_cita_examen'];
            $resultado = $_POST['resultado'];

            $consulta = new Examen();
            return $consulta->insertarResultadoExamen($id_detalle_cita_examen, $resultado);
            
        }catch(PDOException $e){
            return $e;
        }

    }

    // ESTA FUNCION ES PARA QUITAR UN EXAMEN ASIGNADO A UN PACIENTE EN UNA CITA. 
    function quitarExamen(){
        try{
            $id_detalle_cita_examen = $_GET['id_detalle_cita_examen'];

            $consulta = new Examen();
            $consulta->quitarExamenPaciente($id_detalle_cita_examen);
            
            header('Location: /public/View/solicitud/detalle-solicitud.php?id=' . $_GET['id']);

        }catch(PDOException $e){
            return $e;
        }
    }


?>