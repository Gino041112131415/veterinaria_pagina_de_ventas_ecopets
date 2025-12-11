<?php
include_once('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['Email'];
    $password = $_POST['CPassword'];

    $conn = conectar();

    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT * FROM usuarios WHERE EMAIL_USUARIO = '$email' AND CPASSWORD = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        session_start();
        $_SESSION['session_email'] = $email;
        $_SESSION['user_id'] = $user['ID_USUARIO'];
        $_SESSION['user_nombre'] = $user['NOMBRE_USUARIO'];
        $_SESSION['ROL'] = $user['ID_ROL'];
        echo 'success';
    } else {
        echo 'error';
    }

    desconectar($conn);
}
if (isset($_POST["BtnCerrarSesion"])) {
    session_start();
    unset($_SESSION["session_email"]);
    unset($_SESSION["user_id"]);
    unset($_SESSION["user_nombre"]);
    header("location: ../index.php");
}
?>