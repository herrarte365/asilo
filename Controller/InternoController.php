<?php

    require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    require_once (MODEL_PATH.'Interno.php');

    if(isset($_POST['operacion'])){
        switch($_POST['operacion'])
        {
            case "1": 
                setInterno();
                break;
            case "2":
                updateInterno();
                break;
        }
    }

    //TRAER UN INTERNO ESPECIFICO
    function getInterno($id)
    {
        $consulta = new Interno();
        $interno = $consulta->consultarInterno($id);
        return $interno;
    }


    // EXTRAER LISTADO DE INTERNOS
    function getListadoInternos()
    {        
        $consulta = new Interno();
        $internos = $consulta->consultarListado();
        return $internos;
    }

    // AGREGAR NUEVO INTERNO 
    function setInterno()
    {
        try{
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $dpi_interno = $_POST['dpi_interno'];
            $fecha_nac_interno = $_POST['fecha_nac_interno'];
            $medico_personal = $_POST['medico_personal'];
            $telefono_medico = $_POST['telefono_medico'];
            $grupo_sanguineo = $_POST['grupo_sanguineo'];
            $alergia = $_POST['alergia'];
            $enfermedades_cronicas = $_POST['enfermedades_cronicas'];
            $receta_medica = $_POST['receta_medica'];
            $observaciones = $_POST['observaciones'];
            $nombre_encargado = $_POST['nombre_encargado'];
            $dpi_encargado = $_POST['dpi_encargado'];
            $telefono_encargado = $_POST['telefono_encargado'];
            $direccion = $_POST['direccion'];

            $consulta = new Interno();
            return $resultado = $consulta->insertarInterno($nombres, $apellidos, $dpi_interno, $fecha_nac_interno, $medico_personal, 
                                                                $telefono_medico, $grupo_sanguineo, $alergia, $enfermedades_cronicas, 
                                                                $receta_medica, $observaciones, $nombre_encargado, $dpi_encargado, 
                                                                $telefono_encargado, $direccion);
            
        }catch(PDOException $e){
            return $e;
        }

    }

    function updateInterno()
    {
        try{

        $id_ficha_interno = $_POST['id_ficha_interno'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $dpi_interno = $_POST['dpi_interno'];
        $fecha_nac_interno = $_POST['fecha_nac_interno'];
        $medico_personal = $_POST['medico_personal'];
        $telefono_medico = $_POST['telefono_medico'];
        $grupo_sanguineo = $_POST['grupo_sanguineo'];
        $alergia = $_POST['alergia'];
        $enfermedades_cronicas = $_POST['enfermedades_cronicas'];
        $receta_medica = $_POST['receta_medica'];
        $observaciones = $_POST['observaciones'];
        $nombre_encargado = $_POST['nombre_encargado'];
        $dpi_encargado = $_POST['dpi_encargado'];
        $telefono_encargado = $_POST['telefono_encargado'];
        $direccion = $_POST['direccion'];
        $id_encargado = $_POST['id_encargado'];

        $consulta = new Interno();
        return $resultado = $consulta->actualizarInterno($id_ficha_interno, $nombres, $apellidos, $dpi_interno, $fecha_nac_interno, $medico_personal, 
                                                            $telefono_medico, $grupo_sanguineo, $alergia, $enfermedades_cronicas, 
                                                            $receta_medica, $observaciones, $nombre_encargado, $dpi_encargado, 
                                                            $telefono_encargado, $direccion, $id_encargado);
        }catch(PDOException $e){
            return $e;
        }
    }


?>