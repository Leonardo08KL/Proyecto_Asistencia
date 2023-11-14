<?php
class Conexion {
    private $DBServer = 'localhost:3305';
    private $DBUser = 'root'; 
    private $DBPass = ''; 
    private $DBName = 'asistencia';

    public function __construct() {}

    public function conectar() { 
        try {
            $conn = new PDO("mysql:host={$this->DBServer};dbname={$this->DBName}", $this->DBUser, $this->DBPass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $conn;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
            
        }
        
    }
}
 
?>