<?php
require_once 'conexion.php';

class RegistroModel
{
    private $conexion;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->conexion = $conexion->conectar();
    }


    public function crearUsr($idCuenta)
    {
        $Usuario = $_POST['nombre'];
        $apePat = $_POST['apellido_paterno'];
        $apeMat = $_POST['apellido_materno'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        try {
            $stmt = $this->conexion->prepare("INSERT INTO usuario (nombre, apellido_paterno, apellido_materno, cve_catalogo_usuario, cve_cuenta) VALUES (:nombre, :apellido_paterno, :apellido_materno, 1, :cve_cuenta);");
            $stmt->bindParam(':nombre', $Usuario);
            $stmt->bindParam(':apellido_paterno', $apePat);
            $stmt->bindParam(':apellido_materno', $apeMat);
            $stmt->bindParam(':cve_cuenta', $idCuenta);
            //$stmt->bindParam(':correo', $correo);
            //$stmt->bindParam(':contrasena', $contrasena);
            if ($stmt->execute()) {
                $cve_usuario = $this->conexion->lastInsertId();
                echo "Inserción exitosa. ID de usuario: " . $cve_usuario;
                return $cve_usuario; // Retorna el ID del nuevo usuario
            } else {
                echo "Error al ejecutar la consulta.";
            } // Retorna el ID del nuevo producto
        } catch (PDOException $e) {
            die("Error al crear producto: " . $e->getMessage());
        }
    }

    public function crearCuenta()
    {
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        try {
            $stmt = $this->conexion->prepare("INSERT INTO cuenta (correo, contrasena) VALUES (:correo, :contrasena);");
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':contrasena', $contrasena);
            //$stmt->bindParam(':correo', $correo);
            //$stmt->bindParam(':contrasena', $contrasena);
            if ($stmt->execute()) {
                $cve_cuenta = $this->conexion->lastInsertId();
                echo "Inserción exitosa. ID de cuenta: " . $cve_cuenta;
                return $cve_cuenta; // Retorna el ID del nuevo usuario
            } else {
                echo "Error al ejecutar la consulta.";
            } // Retorna el ID del nuevo producto
        } catch (PDOException $e) {
            die("Error al crear producto: " . $e->getMessage());
        }
    }

    public function excepciones(){
        $correo = $_POST["correo"];

        try {
            $stmt = $this->conexion->prepare("SELECT correo from cuenta where correo = :correo ;");
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
        
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                // Hay un registro, devuelve true
                return true;
            } else {
                // No hay un registro, devuelve false
                return false;
            }
        } catch (PDOException $e) {
            die("Error al crear producto: " . $e->getMessage());
        }
    }
}
