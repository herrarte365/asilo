<?php 

Class Conexion
{
    private $db_tipo = 'mysql';
    private $db_host = 'db-mysql-nyc3-50246-asilo-do-user-9818672-0.b.db.ondigitalocean.com';
    private $db_name = 'asilosite';
    private $db_user = 'mario';
    private $db_pass = 'WvViqQyPvxb6uY6D';
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
