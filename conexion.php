<?php
//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

$localhost = 'localhost:3305';
$username = 'root';
$password = '';
$dbname = 'asistencia';

$conn = mysqli_connect($localhost, $username, $password, $dbname);
	
if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
} else{
    echo "Conecion establecida";
}


?>