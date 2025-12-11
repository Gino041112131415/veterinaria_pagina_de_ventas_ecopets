<?php
    $Servidor = "localhost";
    $nombreBD = "e-commerce";
    $usuario = "root";
    $contrasena = "usbw";

    $conection = new mysqli($Servidor,$usuario,$contrasena,$nombreBD);

    if($conection-> connect_error){
        die("No se pudo conectar");
    
    }
?>