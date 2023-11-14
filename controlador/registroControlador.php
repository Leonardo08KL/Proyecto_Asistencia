<?php
require_once '../models/registroModel.php';
require_once '../models/conexion.php';

if (isset($_GET['opc'])) {
    $reg = new RegistroModel();

    switch ($_GET['opc']) {
        case 1:
            if ($reg->excepciones()) {
                // Correo ya registrado, muestra mensaje y redirige a Registro.php
                echo "Correo ya registrado";
            } else {
                // No hay registro, crea cuenta y usuario
                $cuenta = $reg->crearCuenta();
                $usuario = $reg->crearUsr($cuenta);
                echo $cuenta;
                echo $usuario;
            }
            break;

        default:
            echo "Opción no válida";
            break;
    }
} else {
    echo "No registrado";
}

// Redirige después de completar el procesamiento, fuera del bloque PHP
if ($reg->excepciones()) {
    header("Location: ../Registro.php");
    exit;
} else {
    // Puedes redirigir a otra página si lo deseas
    // header('Location: otra_pagina.php');
    // exit;
}
?>
