<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST["Nombre"];
    $apellido_paterno = $_POST["Apellidop"];
    $apellido_materno = $_POST["Apellidom"];
    $correo = $_POST["Email"];
    $contrasena = $_POST["pass"];

    // Aquí puedes realizar cualquier validación o procesamiento adicional

    // Mostrar los datos (esto es solo un ejemplo, no se debe hacer en un entorno de producción)
    echo "Nombre: $nombre<br>";
    echo "Apellido Paterno: $apellido_paterno<br>";
    echo "Apellido Materno: $apellido_materno<br>";
    echo "Correo Electrónico: $correo<br>";
    // No imprimas contraseñas en un entorno de producción, esto es solo con fines educativos
    echo "Contraseña: $contrasena";
} else {
    // Si alguien intenta acceder directamente a este script sin enviar datos por POST, redirigirlo al formulario
    header("Location: Registro.html");
    exit();
}
?>
