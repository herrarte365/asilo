<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
require_once (CONFIG_PATH.'conexion.php');

Class Solicitud extends Conexion{

    private $con; 

    public function __construct() 
    {
        $this->con = new Conexion();
        $this->con = $this->con->connect();
    }

    
    // CONSULTAR LISTADO DE SOLICITUDES DE LA BASE DE DATOS
    public function consultarListado(){
        $sql = "SELECT cita_medica.*, ficha_interno.nombres, ficha_interno.apellidos FROM cita_medica 
                INNER JOIN ficha_interno ON cita_medica.ficha_interno_id_ficha_interno = ficha_interno.id_ficha_interno";

        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    // CREAR UNA NUEVA SOLICITUD
    public function insertarSolicitud($motivo_visita, $enfermero, $especialidad, $interno)
    {
        try{

            $sql_solicitud = "INSERT INTO cita_medica (fecha_solicitud, motivo_visita, estado, especialidad, 
                                enfermero_id_enfermero, ficha_interno_id_ficha_interno)
                                VALUES (now(),?,'Generada',?,?,?);";

            $query = $this->con->prepare($sql_solicitud);
            $query->execute([$motivo_visita, $especialidad, $enfermero, $interno]);

            echo 1;

        }catch(Exception $e){
            echo $e;
        }
        

    }

    //ACTUALIZAR SOLICITUD
    public function actualizarSolicitud($motivo_visita, $enfermero, $especialidad, $id_cita_medica)
    {

        try{

            $sql_interno = "UPDATE cita_medica SET motivo_visita = ?, enfermero_id_enfermero = ?, especialidad = ? 
                            WHERE id_cita_medica = ?";
            
            $query = $this->con->prepare($sql_interno);
            $query->execute([$motivo_visita, $enfermero, $especialidad, $id_cita_medica]);

            echo 2;

        }catch(Exception $e){
            echo $e;
        }

    }

    //CONSULTAR UNA SOLICITUD ESPECIFICA PARA VER DETALLES
    public function consultarSolicitud($id){
        $sql = "SELECT cita_medica.*, ficha_interno.nombres, ficha_interno.apellidos, especialidad.nombre_especialidad, 
                    enfermero.nombre_enfermero, medico_especialista.nombre
                FROM cita_medica 
                INNER JOIN ficha_interno ON cita_medica.ficha_interno_id_ficha_interno = ficha_interno.id_ficha_interno
                INNER JOIN especialidad ON cita_medica.especialidad = especialidad.id_especialidad
                INNER JOIN enfermero ON cita_medica.enfermero_id_enfermero = enfermero.id_enfermero
                LEFT JOIN medico_especialista ON cita_medica.medico_especialista_id_medico_especialista = medico_especialista.id_medico_especialista
                WHERE cita_medica.id_cita_medica = " . $id;

        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    // DEVUELVE EL LISTADO DE ESPECIALIDADES
    public function listadoEspecialidad()
    {
        $sql = "SELECT * FROM especialidad";
        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    // DEVUELVE EL LISTADO DE ENFERMEROS 
    public function listadoEnfermero()
    {
        $sql = "SELECT * FROM enfermero";
        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    // DEVUELVE EL LISTADO DE ESPECIALISTAS
    public function listadoEspecialista()
    {
        $sql = "SELECT * FROM medico_especialista";
        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    
    public function insertarFechaSolicitud($fecha, $hora, $especialista, $cita_medica_id)
    {
        try{

            $fechaHora = $fecha . " " . $hora;
            echo $fechaHora;
            $sql_solicitud = "UPDATE cita_medica SET fecha_visita = ?, estado = 'Aceptada', medico_especialista_id_medico_especialista = ?
                                WHERE id_cita_medica = ?";

            $query = $this->con->prepare($sql_solicitud);
            $query->execute([$fechaHora, $especialista, $cita_medica_id]);

            return 1;

        }catch(Exception $e){
            return $e;
        }
    }

    public function rechazarCitaSolicitud($id_cita_medica)
    {
        try{

            $sql_solicitud = "UPDATE cita_medica SET fecha_visita = null, estado = 'Rechazada', medico_especialista_id_medico_especialista = null
                                WHERE id_cita_medica = ?";

            $query = $this->con->prepare($sql_solicitud);
            $query->execute([$id_cita_medica]);

            echo 1;

        }catch(Exception $e){
            return $e;
        }
    }

    // MEDICO EN MODELO PARA TRAER LAS CITAS ASIGNADAS AL MEDICO ESPECIALISTA
    public function listadoCitasMedicas($id_usuario)
    {
        // TRAEMOS EL CODIGO DEL ESPECIALISTA
        $sql = "SELECT id_medico_especialista FROM medico_especialista WHERE usuario_id_usuario = " . $id_usuario;

        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);

        $sql = "SELECT cita_medica.*, ficha_interno.nombres, ficha_interno.apellidos FROM cita_medica 
                INNER JOIN ficha_interno ON cita_medica.ficha_interno_id_ficha_interno = ficha_interno.id_ficha_interno
                WHERE medico_especialista_id_medico_especialista = " . $request[0]['id_medico_especialista'];

        $execute = $this->con->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }


    // METODO PARA GUARDAR EL DIAGNOSTICO EN LA BASE DE DATOS
    public function insertarDiagnostico($diagnostico, $observaciones, $id_cita_medica)
    {
        try{

            $sql_solicitud = "UPDATE cita_medica SET diagnostico = ?, observaciones_medicas = ?, estado = 'Diagnosticado'
                                WHERE id_cita_medica = ?";

            $query = $this->con->prepare($sql_solicitud);
            $query->execute([$diagnostico, $observaciones, $id_cita_medica]);

            echo 1;

        }catch(Exception $e){
            echo $e;
        }
    }


}

?>