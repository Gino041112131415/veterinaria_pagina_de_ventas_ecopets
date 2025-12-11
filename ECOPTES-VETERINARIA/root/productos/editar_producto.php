<?php

include('../conexion/conexion.php');

$id = $_POST['id'];

$conn = conectar();

$sql = "SELECT A.ID_PRODUCTO AS ID, A.URL_IMAGEN AS IMAGEN, A.NOMBRE AS PRODUCTO, A.PRECIO, A.STOCK 
        FROM PRODUCTOS A
        WHERE A.ID_PRODUCTO = " . $id;
$result = mysqli_query($conn, $sql);

$producto = $categoria = $precio = $imagen = $stock = '';

while($crow = mysqli_fetch_assoc($result)){
    $producto = $crow['PRODUCTO'];
    $precio = $crow['PRECIO'];
    $imagen = $crow['IMAGEN'];
    $stock = $crow['STOCK'];
}

$msg = $producto.','.','.$precio.','.$imagen.','.$stock;

desconectar($conn);

echo $msg;

?>
