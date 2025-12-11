<?php
include('../conexion/conexion.php');

$conn = conectar();

$valores = '';

$sql = "SELECT v.ID_VENTA, u.NOMBRE_USUARIO AS NOMBRE_EMPRESA, p.NOMBRE as PRODUCTO, v.RUC, v.FECHA_VENTA, v.CANTIDAD, v.TOTAL
        FROM ventas v
        JOIN usuarios u ON v.ID_USUARIO = u.ID_USUARIO
        JOIN productos p ON v.ID_PRODUCTO = p.ID_PRODUCTO
        ORDER BY v.TOTAL DESC
        LIMIT 7";

$result = mysqli_query($conn, $sql);

while($crow = mysqli_fetch_assoc($result)){
    $valores .= '<tr>'.
                    '<td>'.$crow['ID_VENTA'].'</td>'.
                    '<td>'.$crow['NOMBRE_EMPRESA'].'</td>'.
                    '<td>'.$crow['PRODUCTO'].'</td>'.
                    '<td>'.$crow['RUC'].'</td>'.
                    '<td>'.$crow['FECHA_VENTA'].'</td>'.
                    '<td>'.$crow['CANTIDAD'].'</td>'.
                    '<td>'.$crow['TOTAL'].'</td>'.
                '</tr>';
}

desconectar($conn);

echo $valores;
?>