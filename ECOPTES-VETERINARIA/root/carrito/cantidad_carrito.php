<?php 
include('../conexion/conexion.php');
session_start();

$cantidad = 0;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $conection = conectar();

    $sql = "SELECT count(1) as total FROM carrito_de_compras WHERE ID_USUARIO = $user_id";
    $result = mysqli_query($conection, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $cantidad = $row['total'];
    }
}

echo $cantidad;
?>