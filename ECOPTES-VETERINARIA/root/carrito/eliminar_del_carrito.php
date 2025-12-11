<?php

session_start();

include('../conexion/conexion.php');
 
if (!isset($_SESSION['user_id'])) {
    die("Debes estar autenticado para acceder al carrito.");
}
 
$user_id = $_SESSION['user_id'];
$id_producto = intval($_POST['id_producto']);
 
$conection = conectar();
 
$sql = "DELETE FROM carrito_de_compras WHERE ID_USUARIO = ? AND ID_PRODUCTO = ?";
$stmt = mysqli_prepare($conection, $sql);
mysqli_stmt_bind_param($stmt, 'ii', $user_id, $id_producto);
mysqli_stmt_execute($stmt);
 
if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Producto eliminado del carrito.";
} else {
    echo "Error al eliminar el producto del carrito.";
}
 
mysqli_stmt_close($stmt);
desconectar($conection);
?>