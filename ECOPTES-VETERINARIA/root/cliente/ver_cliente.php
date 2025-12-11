<?php
session_start();

include('../conexion/conexion.php');


if (!isset($_SESSION['user_id'])) {
    die('Error: Usuario no autenticado');
}


$user_id = $_SESSION['user_id'];


$conn = conectar();


$sql = "SELECT RAZON_SOCIAL, DNI, RUC, NOMBRE, TELEFONO, DIRECCION, EMAIL, CPASSWORD, IMG_PERFIL FROM CLIENTES WHERE ID_USUARIO = '$user_id'";

$result = mysqli_query($conn, $sql);


if ($crow = mysqli_fetch_assoc($result)) {
    $img_perfil_url =  $crow['IMG_PERFIL'];
    echo $crow['RAZON_SOCIAL'] . ',' .
         $crow['DNI'] . ',' .
         $crow['RUC'] . ',' .
         $crow['NOMBRE'] . ',' .
         $crow['TELEFONO'] . ',' .
         $crow['DIRECCION'] . ',' .
         $crow['EMAIL'] . ',' .
         $crow['CPASSWORD'] . ',' .
         $img_perfil_url;
} else {
    echo 'No se encontraron datos para el usuario.';
}


desconectar($conn);
?>
