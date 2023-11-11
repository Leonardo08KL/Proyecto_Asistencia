<?php  
$nombre = $_POST['nombre'];
$a_paterno = $_POST['apellido_paterno'];
$a_materno = $_POST['apellido_materno'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$connectionDB = new connectionDB();

if($connectionDB->comprobarCorreoDuplicado($correo)){
    header("Location: ./Registro.html?enviado=true");
    exit;
} else{

}

?>

<?php 


class connectionDB{

    public static function comprobarCorreoDuplicado($correo){
        require ('./conexion.php');
 
        $correo = mysqli_real_escape_string($conn, $correo);

        $sql = "SELECT correo
        from cuenta where correo = '$correo';";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Cerrar la conexión a la base de datos
            mysqli_close($conn);
            return true;
        } else {
            // Cerrar la conexión a la base de datos
            mysqli_close($conn);
            return false;
        }
    }
}

?>