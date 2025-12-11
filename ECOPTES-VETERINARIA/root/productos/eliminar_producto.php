<?php

include('../conexion/conexion.php');

$id = $_POST['id'];

$conn = conectar();

$sql = "SELECT nombre, precio, url_imagen, stock FROM productos WHERE ID_PRODUCTO = " . $id;
$result = mysqli_query($conn, $sql);

while($crow = mysqli_fetch_assoc($result)){
    $nombre = $crow['nombre'];
    $precio = $crow['precio'];
    $url_imagen = $crow['url_imagen'];
    $stock = $crow['stock'];
}

$sql = "DELETE FROM productos WHERE ID_PRODUCTO = " . $id;
$result = mysqli_query($conn, $sql);

$msg = 'El Producto '.$nombre.' con precio '.$precio.' ha sido eliminado';

desconectar($conn);

echo $msg;

?>



