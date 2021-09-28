<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
require_once (CONFIG_PATH.'conexion.php');

Class Interno extends Conexion{

    private $con; 

    public function __construct() 
    {
        $this->con = new Conexion();
        $this->con = $this->con->connect();
    }

    
    // CONSULTAR LISTADO DE INTERNOS DE LA BASE DE DATOS
    public function consultarListado(){
        $sql = "SELECT * FROM ficha_interno";
        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function insertarInterno($nombres, $apellidos, $dpi_interno, $fecha_nac_interno, $medico_personal, 
                                    $telefono_medico, $grupo_sanguineo, $alergia, $enfermedades_cronicas, 
                                    $receta_medica, $observaciones, $nombre_encargado, $dpi_encargado, 
                                    $telefono_encargado, $direccion)
    {
        try{
            $this->con->beginTransaction();

            $sql_encargado = "INSERT INTO encargado (nombre, cui_encargado, telefono, direccion, estado_encargado) VALUES (?,?,?,?,?)";
            $query = $this->con->prepare($sql_encargado);
            $query->execute([$nombre_encargado, $dpi_encargado, $telefono_encargado, $direccion, 'Solvente']);


            $id = $this->con->lastInsertId();

            $sql_interno = "INSERT INTO ficha_interno (nombres, apellidos, cui, fecha_nacimiento, medico_personal, telefono_medico,
                                grupo_sanguineo, alergias, enfermedades_cronicas, receta_medico, observaciones, estado_interno, encargado_id_encargado, fecha_ingreso) 
                                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?, now())";

            $query = $this->con->prepare($sql_interno);
            $query->execute([$nombres, $apellidos, $dpi_interno, $fecha_nac_interno, $medico_personal, $telefono_medico, $grupo_sanguineo, 
                            $alergia, $enfermedades_cronicas, $receta_medica, $observaciones, 'Activo', $id]);

            $this->con->commit();

            echo 1;

        }catch(Exception $e){
            $this->con->rollBack();
            echo $e;
        }
        

    }

    public function actualizarInterno($id_ficha_interno, $nombres, $apellidos, $dpi_interno, $fecha_nac_interno, $medico_personal, 
        $telefono_medico, $grupo_sanguineo, $alergia, $enfermedades_cronicas, 
        $receta_medica, $observaciones, $nombre_encargado, $dpi_encargado, 
        $telefono_encargado, $direccion, $id_encargado)
    {

        try{
            $this->con->beginTransaction();

            $sql_interno = "UPDATE ficha_interno SET nombres = ?, apellidos = ?, cui = ?, fecha_nacimiento = ?, medico_personal = ?,
                                telefono_medico = ?, grupo_sanguineo = ?, alergias = ?, enfermedades_cronicas = ?, receta_medico = ?, 
                                observaciones = ? WHERE id_ficha_interno = ?";
            
            $query = $this->con->prepare($sql_interno);
            $query->execute([$nombres, $apellidos, $dpi_interno, $fecha_nac_interno, $medico_personal, $telefono_medico, $grupo_sanguineo, 
                            $alergia, $enfermedades_cronicas, $receta_medica, $observaciones, $id_ficha_interno]);


            $id = $this->con->lastInsertId();

            $sql_encargado = "UPDATE encargado SET nombre = ?, cui_encargado = ?, telefono = ?, direccion = ? WHERE id_encargado = ?";

            $query = $this->con->prepare($sql_encargado);
            $query->execute([$nombre_encargado, $dpi_encargado, $telefono_encargado, $direccion, $id_encargado]);

            $this->con->commit();

            echo 2;

        }catch(Exception $e){
            $this->con->rollBack();
            echo $e;
        }

    }

    public function consultarInterno($id){
        $sql = "SELECT * FROM ficha_interno 
                INNER JOIN encargado ON ficha_interno.encargado_id_encargado = encargado.id_encargado
                WHERE id_ficha_interno = " . $id;
        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }


}

?>