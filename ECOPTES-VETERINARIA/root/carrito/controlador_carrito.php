<?php

session_start();

include('../conexion/conexion.php');

$conection = conectar();

if (!isset($_SESSION['user_id'])) {
    die("Debes estar autenticado para acceder al carrito.");
}

$user_id = $_SESSION['user_id'];

function obtenerProductos($conection) {
    $productos = [];
    $sql = "SELECT ID_PRODUCTO, NOMBRE, PRECIO, URL_IMAGEN, DESCRIPCION FROM productos";
    $result = mysqli_query($conection, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $productos[$row['ID_PRODUCTO']] = [
            'nombre' => $row['NOMBRE'],
            'precio' => $row['PRECIO'],
            'imagen' => $row['URL_IMAGEN'],
            'descripcion' => $row['DESCRIPCION']
        ];
    }

    return $productos;
}

$productos = obtenerProductos($conection);

$sql = "SELECT ID_PRODUCTO, CANTIDAD FROM carrito_de_compras WHERE ID_USUARIO = $user_id";
$result = mysqli_query($conection, $sql);

$valores = "";
$total = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $id_producto = $row['ID_PRODUCTO'];
    $cantidad = $row['CANTIDAD'];
    $producto = $productos[$id_producto];
    $subtotal = $producto['precio'] * $cantidad;

    $valores .= '<tr>'.
                    '<td><img src="./images/'.$producto['imagen'].'" alt="Producto" style="width:50px;"></td>'.
                    '<td>'.$producto['nombre'].'</td>'.
                    '<td>'.
                        '<button class="decrementar" data-id="'.$id_producto.'"><i class="fa fa-minus"></i></button>'.
                        ' <span class="cantidad" data-id="'.$id_producto.'">'.$cantidad.'</span> '.
                        '<button class="incrementar" data-id="'.$id_producto.'"><i class="fa fa-plus"></i></button>'.
                    '</td>'.
                    '<td>S/ '.$producto['precio'].'</td>'.
                    '<td class="subtotal" data-id="'.$id_producto.'" data-precio="'.$producto['precio'].'">S/ '.$subtotal.'</td>'.
                    '<td><button onclick="eliminarProductoDelCarrito('.$id_producto.')"><i class="fa fa-trash"></i></button></td>'.
                '</tr>';
    $total += $subtotal;
}

$valores .= '<tr>'.
                '<td colspan="5" class="text-right"><strong>Total:</strong></td>'.
                '<td colspan="2"><strong>S/ '.$total.'</strong></td>'.
            '</tr>';

desconectar($conection);

echo $valores;
?>
