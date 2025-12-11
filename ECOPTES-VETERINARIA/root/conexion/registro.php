<?php
include_once('conexion.php');  // Incluye tu script de conexión a la base de datos
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $EmpresaRUC = $_POST["EmpresaRUC"];
    $NombreEmpresa = $_POST["NombreEmpresa"];
    $DNI = $_POST["DNI"];
    $NombreCliente = $_POST["NombreCliente"];
    $Numero = $_POST["Numero"];
    $Direccion = $_POST["Direccion"];
    $Email = $_POST["Email"];
    $CPassword = $_POST["CPassword"];
    $ID_Rol = 1;
 
    // Conexión a la base de datos
    $conn = conectar();
 
// Consulta para insertar en Usuarios
        $sqlUsuarios = $conn->query("INSERT INTO `Usuarios` (`EMAIL_USUARIO`, `CPASSWORD`, `NOMBRE_USUARIO`, `ID_ROL`)
        VALUES ('$Email', '$CPassword', '$NombreEmpresa', '$ID_Rol')");
 
    if ($sqlUsuarios) {
        // Obtener el ID_USUARIO recién generado
        $ID_USUARIO = $conn->insert_id;
 
        // Consulta para insertar en Clientes
        $sqlClientes = $conn->query("INSERT INTO `Clientes` (`RUC`, `RAZON_SOCIAL`, `DNI`, `NOMBRE`, `TELEFONO`, `DIRECCION`, `EMAIL`, `CPASSWORD`, `IMG_PERFIL`, `ID_USUARIO`)
                        VALUES ('$EmpresaRUC', '$NombreEmpresa', '$DNI', '$NombreCliente', '$Numero', '$Direccion', '$Email', '$CPassword', 'default.png', '$ID_USUARIO')");
 
        if ($sqlClientes) {
            echo '<script>
                    alert("Registro exitoso");
                    window.location.href = "login.php";
                  </script>';
        } else {
            echo '<div class="alert alert-danger">Error al crear el cliente</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Error al crear el usuario</div>';
    }
 
    // Cierra la conexión a la base de datos
    desconectar($conn);
}
?>