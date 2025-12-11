<?php

include('../conexion/conexion.php');

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$file_name = $_FILES['imagen']['name'];
$ruta_completa = "../images/" . $file_name;
move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_completa);
$imagen = $file_name; 

$conn = conectar();

$sql = "INSERT INTO productos (nombre, precio, url_imagen, stock) 
        VALUES ('".$nombre."', '".$precio."', '".$imagen."', '".$stock."')";
$result = mysqli_query($conn, $sql);

$msg = 'Producto '.$nombre.' registrado';

desconectar($conn);

echo $msg;

?>