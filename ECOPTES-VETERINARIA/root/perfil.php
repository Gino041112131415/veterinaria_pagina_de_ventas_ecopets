<?php
session_start();  // Asegurarse de iniciar la sesión
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>Actualizar Pefil</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/ecopets.png">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>

    <!-- App styles -->
    <link rel="stylesheet" href="styles/pe-icons/pe-icon-7-stroke.css"/>
    <link rel="stylesheet" href="styles/pe-icons/helper.css"/>
    <link rel="stylesheet" href="styles/stroke-icons/style.css"/>
    <link rel="stylesheet" href="styles/style.css">
    
    <!-- sweetalert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<body>

<!-- Wrapper-->
<div class="wrapper">

    <!-- Header-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <div id="mobile-menu">
                    <div class="left-nav-toggle">
                        <a href="#">
                            <i class="stroke-hamburgermenu"></i>
                        </a>
                    </div>
                </div>
                <a class="navbar-brand" href="index.php">
                    EcoPets
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <div class="left-nav-toggle">
                    <a href="#">
                        <i class="stroke-hamburgermenu"></i>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="profil-link">
                        <a href="index-2.php">
                            <span class="profile-address"><?php echo $_SESSION['session_email']; ?></span>
                            <img src="images/profile.jpg" class="img-circle" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End header-->

    <!-- Navigation-->
    <aside class="navigation">
        <nav>
            <ul class="nav luna-nav">
                <li class="inactive">
                    <a>Inicio</a>
                </li>
                <?php if ($_SESSION['ROL'] == 2) { ?>
                <li class="inactive">
                    <a href="ventas.php">Ventas</a>
                </li>
                <li class="inactive">
                    <a href="productos.php">Productos</a>
                </li>
                <li class="inactive">
                    <a href="cliente.php">Clientes</a>
                </li>
                <?php } ?>
                <li class="active">
                    <a href="perfil.php">Mi Perfil</a>
                </li>
            </ul>
        </nav>
    </aside>
    <!-- End navigation-->


    <!-- Main content-->
<section class="content">
    <div class="container-fluid">

        <div class="row m-t-sm">
            <div class="col-md-15">
                <div class="panel">
                    <div class="panel-body">
                        <h3 class="m-b-xs"><i class="fas fa-box text-warning m-r-xs"></i> Mi Perfil</h3>
                        <hr/>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12" id="list_cliente">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <div class="panel-body">
                            <form id="registroForm" action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-lg-12 text-center">
                                        <img src="path/to/default/image.jpg" alt="Imagen del cliente" id="clienteImagen" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="EmpresaRUC">RUC de la Empresa</label>
                                        <input type="text" class="form-control" id="EmpresaRUC" name="EmpresaRUC">
                                        <span class="help-block small">RUC de la empresa registrada</span>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="RAZON_SOCIAL">Nombre de la Empresa</label>
                                        <input type="text" class="form-control" id="RAZON_SOCIAL" name="RAZON_SOCIAL">
                                        <span class="help-block small">Nombre de la empresa registrada</span>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="DNI">DNI</label>
                                        <input type="text" class="form-control" id="DNI" name="DNI" required>
                                        <span class="help-block small">DNI del cliente registrado</span>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="NombreCliente">Nombres y Apellidos</label>
                                        <input type="text" class="form-control" id="NombreCliente" name="NombreCliente">
                                        <span class="help-block small">Nombre del cliente registrado</span>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="Numero">Teléfono</label>
                                        <input type="number" class="form-control" id="Numero" name="Numero" step="1" min="0">
                                        <span class="help-block small">Teléfono del cliente registrado</span>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="Direccion">Dirección</label>
                                        <input type="text" class="form-control" id="Direccion" name="Direccion">
                                        <span class="help-block small">Dirección del cliente registrada</span>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                        <span class="help-block small">Email del cliente registrado</span>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="cpassword">Password</label>
                                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                                        <span class="help-block small">Contraseña del cliente registrada</span>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="imagen">Imagen</label>
                                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                                        <span class="help-block small">Imagen del cliente registrado</span>
                                    </div>
                                    <div class="form-group col-lg-12 text-right">
                                        <button type="button" class="btn btn-primary" onclick="actualizar_cliente()">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Registrar_Productos" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lblTitulo">Nuevo Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button onclick="actualizar_cliente()" type="button" class="btn btn-primary" id="btnNuevo"
                        form="registroForm">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- End main content-->

</div>
<!-- End wrapper-->

<!-- Vendor scripts -->
<script src="vendor/pacejs/pace.min.js"></script>
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/flot/jquery.flot.min.js"></script>
<script src="vendor/flot/jquery.flot.resize.min.js"></script>
<script src="vendor/flot/jquery.flot.spline.js"></script>

<!-- App scripts -->
<script src="js/luna.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>

<script>
var valor;

$(document).ready(function () {
    carga_datos_cliente();
});

function carga_datos_cliente() {
    $.ajax({
        type: "POST",
        url: "./cliente/ver_cliente.php",
        async: false,
        success: function(result) {
            try {
                valor = result.split(',');
                console.log(valor); // Añade esto para ver los datos en la consola

                $('#RAZON_SOCIAL').val(valor[0]);
                $('#DNI').val(valor[1]);
                $('#EmpresaRUC').val(valor[2]);
                $('#NombreCliente').val(valor[3]);
                $('#Numero').val(valor[4]);
                $('#Direccion').val(valor[5]);
                $('#email').val(valor[6]);
                $('#cpassword').val(valor[7]);
                $('#clienteImagen').attr("src", "./images/" + valor[8]);
            } catch (e) {
                console.error('Error procesando los datos del cliente: ', e);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX: ', xhr, status, error);
        }
    });
}

function actualizar_cliente() {
    var formData = new FormData($('#registroForm')[0]);

    $.ajax({
        type: "POST",
        url: "./cliente/actualizar_cliente.php",
        data: formData,
        contentType: false,
        processData: false,
        async: false,
        success: function(result) {
            Swal.fire({
                icon: 'success',
                title: 'Actualización de Cliente',
                text: result
            });
            carga_datos_cliente();
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un problema al actualizar el cliente.'
            });
        }
    });
}
</script>

</body>
</html>
