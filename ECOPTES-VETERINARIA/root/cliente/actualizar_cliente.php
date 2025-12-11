<?php

session_start();
include('../conexion/conexion.php');


if (!isset($_SESSION['user_id'])) {
    die('Error: Usuario no autenticado');
}


$user_id = $_SESSION['user_id'];


$razon_social = $_POST['RAZON_SOCIAL'] ?? '';
$dni = $_POST['DNI'] ?? '';
$ruc = $_POST['EmpresaRUC'] ?? '';
$nombre = $_POST['NombreCliente'] ?? '';
$telefono = $_POST['Numero'] ?? '';
$direccion = $_POST['Direccion'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';


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
   
    $query = "SELECT IMG_PERFIL FROM CLIENTES WHERE ID_USUARIO = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $imagen = $row['IMG_PERFIL'];
    } else {
        echo "No se encontró el cliente especificado.";
        exit;
    }
}


$sql = "UPDATE CLIENTES SET 
            RAZON_SOCIAL = ?, 
            DNI = ?, 
            RUC = ?, 
            NOMBRE = ?, 
            TELEFONO = ?, 
            DIRECCION = ?, 
            EMAIL = ?, 
            CPASSWORD = ?, 
            IMG_PERFIL = ? 
        WHERE ID_USUARIO = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssi", $razon_social, $dni, $ruc, $nombre, $telefono, $direccion, $email, $password, $imagen, $user_id);

if ($stmt->execute()) {
    $msg = 'Los datos del cliente se han actualizado correctamente';
} else {
    $msg = 'Error al actualizar los datos del cliente: ' . $stmt->error;
}


desconectar($conn);

echo $msg;

?>
