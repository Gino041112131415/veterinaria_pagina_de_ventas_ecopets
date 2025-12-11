<?php
 // Metodo para crear un directorio si no existe
 function CrearDirectorio($carpeta) {
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
}

// Metodo para cargar todos los archivos de una carpeta
function listarArchivos($carpeta) {
    $archAttachemt = array();
    if (is_dir($carpeta)) {
        $archivos = scandir($carpeta);
        foreach ($archivos as $key => $archivo) {
            if ($archivo != "." && $archivo != "..") {
                $rutaCompleta = $carpeta . '/' . $archivo;
                if (is_file($rutaCompleta)) {
                    $archAttachemt[] = $rutaCompleta;
                }
            }
        }
    }

    return $archAttachemt;
}

// Se elimina directorio
function EliminarDirectorio($carpeta) {
    foreach (glob($carpeta . "/*") as $archivos_carpeta) {
        if (is_dir($archivos_carpeta)) {
            EliminarDirectorio($archivos_carpeta);
        } else {
            unlink($archivos_carpeta);
        }
    }
    rmdir($carpeta);
}


?>