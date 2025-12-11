<?php

session_start();

include('../conexion/conexion.php');
require('../utils/Reporte.php');
require('../utils/Archivos.php');
require('../utils/Correo.php');

if (!isset($_SESSION['user_id'])) {
    die('Error: Usuario no autenticado');
}

$id = $_SESSION['user_id'];
$fecha = date('Y-m-d H:i:s');
 
 $conn = conectar();
 
 $sqlIdVenta = "SELECT MAX(ID_VENTA) AS max_id FROM ventas";
 $result = mysqli_query($conn,$sqlIdVenta);
 $row = mysqli_fetch_assoc($result);
 $ID_VENTA = $row['max_id'] + 1;
 

$sqlcompra = "SELECT A.ID_USUARIO,A.ID_PRODUCTO,B.RUC,A.CANTIDAD,A.SUBTOTAL , P.PRECIO , P.NOMBRE FROM CARRITO_DE_COMPRAS A LEFT JOIN CLIENTES B ON A.ID_USUARIO = B.ID_USUARIO
    INNER JOIN PRODUCTOS P ON p.ID_PRODUCTO = A.ID_PRODUCTO 
    WHERE A.ID_USUARIO = '$id'";
$resultado_venta = mysqli_query( $conn, $sqlcompra);
$total  = 0;
while ($row = mysqli_fetch_assoc($resultado_venta)) {
    $ID_USUARIO = $row['ID_USUARIO'];
    $PRODUCTO = $row['ID_PRODUCTO'];
    $RUC = $row['RUC'];
    $Cantidad = $row['CANTIDAD'];
    $subtotal = $row['SUBTOTAL'];
    $total = $total +  $subtotal;

    $sqlventa_final = "INSERT INTO  VENTAS (ID_VENTA, ID_USUARIO, ID_PRODUCTO, RUC, FECHA_VENTA, CANTIDAD, TOTAL)
                       VALUES ('$ID_VENTA', '$ID_USUARIO', '$PRODUCTO', '$RUC', NOW(), '$Cantidad', '$subtotal')";
    mysqli_query($conn, $sqlventa_final);
 

    $sqlstock = "UPDATE PRODUCTOS SET STOCK = STOCK - $Cantidad WHERE ID_PRODUCTO = $PRODUCTO";
    mysqli_query($conn, $sqlstock);
 
    $ID_VENTA++;
    }
 

$sqlvaciarCarrito = "DELETE FROM CARRITO_DE_COMPRAS WHERE ID_USUARIO = '$id'";
mysqli_query($conn, $sqlvaciarCarrito);
 


date_default_timezone_set('America/Lima');
$tiempo = round(microtime(true)); 
$directorio = "../archivos_" . $tiempo;
CrearDirectorio($directorio);

// Generar PDF
$pdf = new Reporte();

$pdf->nombre = $_SESSION["user_nombre"];
$pdf->fecha = $fecha;
$pdf->total = $total;
$pdf->data = $resultado_venta;
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->CrearTabla();

$pdf->Output('F', $directorio . '/VENTA_'.$ID_VENTA . '_' . date('d_m_y') . '.pdf');



$archAttachemt = listarArchivos($directorio); 


$objCorreo = new Correo();
$asunto = 'BOLETA DE VENTA';
$correo = $_SESSION["session_email"];
//$correo = "jairhassler@gmail.com";

$cuerpo = "Estimado usuario le hacemos presente el envio de su boleta de venta: " . $_SESSION["user_nombre"];
$html = false;
$msg = $objCorreo->EnviarCorreo($correo, $archAttachemt, $asunto, $cuerpo, $html);


EliminarDirectorio($directorio);


echo "Venta registrada correctamente con ID: $ID_VENTA. El carrito ha sido limpiado. Stock actualizado.";
desconectar($conn);
?>