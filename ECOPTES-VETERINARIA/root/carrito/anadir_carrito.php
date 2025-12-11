<?php
session_start();

include('../conexion/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];

    $conn = conectar();

    if (!isset($_SESSION['user_id'])) {
        die("Debes estar autenticado para añadir al carrito.");
    }

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM carrito_de_compras WHERE ID_USUARIO = $user_id AND ID_PRODUCTO = $productId";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nueva_cantidad = $row['CANTIDAD'] + 1;
        $sql = "UPDATE carrito_de_compras SET CANTIDAD = $nueva_cantidad, Subtotal = CANTIDAD * (SELECT PRECIO FROM productos WHERE ID_PRODUCTO = $productId) WHERE ID_USUARIO = $user_id AND ID_PRODUCTO = $productId";
        mysqli_query($conn, $sql);
    } else {
        $sql = "INSERT INTO carrito_de_compras (ID_USUARIO, ID_PRODUCTO, CANTIDAD, Imagen, Producto, Descripcion, Subtotal) SELECT $user_id, $productId, 1, URL_IMAGEN, NOMBRE, DESCRIPCION, PRECIO FROM productos WHERE ID_PRODUCTO = $productId";
        mysqli_query($conn, $sql);
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = 0;
    }

    $_SESSION['cart'][$productId]++;

    $sql = "SELECT count(1) as total FROM carrito_de_compras WHERE ID_USUARIO = $user_id";
    $result = mysqli_query($conn, $sql);
    $cantidad = 0;
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $cantidad = $row['total'];
    }

    echo "Producto añadido al carrito. Cantidad total en el carrito: ".$cantidad;

    desconectar($conn);
} else {
    echo "Solicitud inválida.";
}
?>