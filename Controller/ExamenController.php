<?php

    require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    require_once (MODEL_PATH.'Examen.php');

    if(isset($_POST['operacion'])){
        switch($_POST['operacion'])
        {
            case "1": 
                setExamen();
                break;
        }
    }

    //TRAER UN EXAMEN ESPECIFICO
    function getExamen($id)
    {
        $consulta = new Interno();
        $interno = $consulta->consultarInterno($id);
        return $interno;
    }

    function getExamenesSolicitadosPaciente($id_cita_medica){
        $consulta = new Examen();
        $examenesSolicitados = $consulta->listadoExamenesSolicitadosPaciente($id_cita_medica);
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

?>