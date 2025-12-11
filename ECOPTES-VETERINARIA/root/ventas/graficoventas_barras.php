<?php
include_once ('./conexion/conexion.php');

$conn = conectar();
$query = $conn->query("SELECT p.NOMBRE, SUM(v.CANTIDAD) as total_vendido
    FROM ventas v
    JOIN productos p ON v.ID_PRODUCTO = p.ID_PRODUCTO
    GROUP BY v.ID_PRODUCTO
    ORDER BY total_vendido ASC");

$nombreG = [];
$Tvendido = [];
while($crow = mysqli_fetch_assoc($query )){
    $nombreG[] = $crow['NOMBRE'];
    $Tvendido[] = $crow['total_vendido'];
}
desconectar($conn);

?>


