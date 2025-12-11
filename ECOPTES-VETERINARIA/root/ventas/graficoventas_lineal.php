<?php
include_once('./conexion/conexion.php');

$conn = conectar();
$query = $conn->query("SELECT DATE_FORMAT(FECHA_VENTA, '%Y-%m') as mes, SUM(TOTAL) as total_ventas
    FROM VENTAS
    GROUP BY mes
    ORDER BY mes ASC");
$nombreM = [];
$Rvendido = [];
while($crow = mysqli_fetch_assoc($query )){
    $nombreM[] = $crow["mes"];
    $Rvendido[] = $crow["total_ventas"];
}
desconectar($conn);

?>

