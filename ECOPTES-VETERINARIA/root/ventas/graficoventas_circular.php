<?php
include_once ('./conexion/conexion.php');


$conn = conectar();
$query = $conn->query("SELECT NOMBRE, STOCK FROM productos");
$nombreProductos = [];
$stockProductos = [];
while($crow = mysqli_fetch_assoc($query )){
    $nombreProductos[] = $crow["NOMBRE"];
    $stockProductos[] = $crow["STOCK"];
}
desconectar($conn);
?>


