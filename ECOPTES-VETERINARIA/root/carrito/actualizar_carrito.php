<?php
session_start();

include('../conexion/conexion.php');

$conection = conectar();

if (!isset($_SESSION['user_id'])) {
    die("Debes estar autenticado para acceder al carrito.");
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_producto = intval($_POST['id']);
    $cantidad = intval($_POST['cantidad']);

    if ($cantidad > 0) {
        $sql = "UPDATE carrito_de_compras SET CANTIDAD = $cantidad WHERE ID_USUARIO = $user_id AND ID_PRODUCTO = $id_producto";
        mysqli_query($conection, $sql);
    }
}

desconectar($conection);
?>
