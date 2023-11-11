<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST["Nombre"];
    $apellido_paterno = $_POST["Apellidop"];
    $apellido_materno = $_POST["Apellidom"];
    $correo = $_POST["Email"];
    $contrasena = password_hash($_POST["pass"], PASSWORD_DEFAULT); // Hash de la contraseña

    // Conexión a la base de datos (modifica los valores según tu configuración)
    $servername = "localhost:3306";
    $username = "root'";
    $password = "";
    $dbname = "asistencia";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar datos en la tabla usuarios
    $sqlUsuarios = "INSERT INTO usuarios (nombre, apellido_paterno, apellido_materno, correo, contraseña) VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$correo', $contrasena)";

    if ($conn->query($sqlUsuarios) === TRUE) {
        // Obtener el ID del último registro insertado en la tabla usuarios
        $usuarioID = $conn->insert_id;
        echo "Registro exitoso";
    } else {
        echo "Error al insertar en la tabla usuarios: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
