<?php
/// Controlador para login
if(isset($_POST["BtnIngreso"])) {
    if(empty($_POST["email"]) || empty($_POST["CPassword"])) {
        echo '<div class = "alert alert-danger">Los campos están vacíos</div>';
    } else {
        $email = $_POST["Email"];
        $contrasena = $_POST["CPassword"];
        $sql = $conection-> query ("SELECT EMAIL_USUARIO, CPASSWORD FROM USUARIOS WHERE EMAIL_USUARIO='$email' AND CPASSWORD='$contrasena'");
        if($datos = $sql->fetch_object()){
            header("location:index.php");
            exit();
        }else{
            echo '<div class = "alert alert-danger">El usuario no existe</div>';
        }
    }
}

?>

<?php
/// Controlador para registrar datos de clientes
if (isset($_POST["BtnRegistro"])) {
    $EmpresaRUC = $_POST["EmpresaRUC"];
    $NombreEmpresa = $_POST["NombreEmpresa"];
    $DNI = $_POST["DNI"];
    $NombreCliente = $_POST["NombreCliente"];
    $Numero = $_POST["Numero"];
    $Direccion = $_POST["Direccion"];
    $Email = $_POST["Email"];
    $CPassword = $_POST["CPassword"];

    $sql = $conection->query("INSERT INTO `Clientes` (`RUC`, `RAZON_SOCIAL`, `DNI`, `NOMBRE`, `TELEFONO`, `DIRECCION`, `EMAIL`, `CPASSWORD`, `IMG_PERFIL`) VALUES ('$EmpresaRUC', '$NombreEmpresa', '$DNI', '$NombreCliente', '$Numero', '$Direccion', '$Email', '$CPassword', 'default.png')");

    if ($sql) {
        echo '<script>
                alert("Registro exitoso");
                window.location.href = "login.php";
              </script>';
    } else {
        echo '<div class="alert alert-danger">Error al crear el usuario</div>';
    }
}
?>