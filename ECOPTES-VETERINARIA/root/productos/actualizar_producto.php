<?php

include('../conexion/conexion.php');

if (!isset($_POST['id'])) {
    echo "ID del producto no especificado.";
    exit;
}

$id = $_POST['id'];
$nombre = $_POST['nombre'] ?? '';
$precio = $_POST['precio'] ?? 0;
$stock = $_POST['stock'] ?? 0;

$conn = conectar();

if (!empty($_FILES['imagen']['name'])) {
    $file_name = $_FILES['imagen']['name'];
    $ruta_completa = "../images/" . $file_name;
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_completa)) {
        $imagen = $file_name;
    } else {
        echo "Error al mover el archivo.";
        exit;
    }
} else {
    $query = "SELECT URL_IMAGEN FROM productos WHERE ID_PRODUCTO = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $imagen = $row['URL_IMAGEN'];
    } else {
        echo "No se encontró el producto especificado.";
        exit;
    }
}

$sql = "UPDATE productos SET nombre = ?, precio = ?, url_imagen = ?, stock = ? WHERE ID_PRODUCTO = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sdsii", $nombre, $precio, $imagen, $stock, $id);

if ($stmt->execute()) {
    echo 'El producto se ha actualizado correctamente.';
} else {
    echo "Error al actualizar el producto: " . $stmt->error;
}

desconectar($conn);

?>
