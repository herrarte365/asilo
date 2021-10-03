<?php 

Class Conexion
{
    private $db_tipo = 'mysql';
    private $db_host = 'localhost';
    private $db_name = 'asilosite';
    private $db_user = 'root';
    private $db_pass = '';
    private $conn;

    public function __construct()
    {
        try{
            $this->conn = new PDO($this->db_tipo.':host='.$this->db_host.';dbname='.$this->db_name, $this->db_user, $this->db_pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            $this->conn = "Error de conexion";
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function connect()
    {
        return $this->conn;
    }

}

?>