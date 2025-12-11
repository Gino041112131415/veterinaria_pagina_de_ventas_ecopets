<?php
$Servidor = "localhost";
$nombreBD = "e-commerce";
$usuario = "root";
$contrasena = "usbw";

function conectar() {
    global $Servidor, $usuario, $contrasena, $nombreBD;
    $conn = new mysqli($Servidor, $usuario, $contrasena, $nombreBD);
    if ($conn->connect_error) {
        die("No se pudo conectar: " . $conn->connect_error);
    }
    return $conn;
}

function desconectar($conn) {
    $conn->close();
}
?>