<!DOCTYPE html>
<html>
 
<!-- Mirrored from webapplayers.com/luna_admin-v1.1/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2016 14:23:25 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>
 
    <!-- Page title -->
    <title>LUNA | Responsive Admin Theme</title>
 
    <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
 
    <!-- App styles -->
    <link rel="stylesheet" href="styles/pe-icons/pe-icon-7-stroke.css"/>
    <link rel="stylesheet" href="styles/pe-icons/helper.css"/>
    <link rel="stylesheet" href="styles/stroke-icons/style.css"/>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body class="blank">
 
<!-- Wrapper-->
<div class="wrapper">
 
 
    <!-- Main content-->
    <section class="content">
        <div class="back-link">
            <a href="index.php" class="btn btn-accent">Regresar al Inicio</a>
        </div>
 
        <div class="container-center lg animated slideInDown">
 
 
            <div class="view-header">
                <div class="header-icon">
                    <img src="images/ecopets.png" alt="Master in Pets" width="80%">
                </div>
                <div class="header-title">
                    <h3>Register</h3>
                    <small>
                        Please enter your data to register.
                    </small>
                </div>
            </div>
 
            <div class="panel panel-filled">
                <div class="panel-body">
                    <p>
 
                    </p>
                    <form id="registroForm" action="" method = "post">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="EmpresaRUC">RUC de la Empresa</label>
                                <input  type="text" class = "form-control" id = "EmpresaRUC" name = "EmpresaRUC" autofocus required>
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="NombreEmpresa">Nombre de la Empresa</label>
                                <input  type="text" class = "form-control" id = "NombreEmpresa" name = "NombreEmpresa" required>
                                <span class="help-block small">Your hard to guess password</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="DNI">DNI</label>
                                <input  type="text" class = "form-control" id = "DNI" name = "DNI" required>
                                <span class="help-block small">Your hard to guess password</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="NombreCliente">Nombres y Apellidos</label>
                                <input  type="text" class = "form-control" id = "NombreCliente" name = "NombreCliente">
                                <span class="help-block small">Your hard to guess password</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="Numero">Telefono</label>
                                <input  type="number" class = "form-control" id = "Numero" name = "Numero" step="1" min="0" required>
                                <span class="help-block small">Your hard to guess password</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="Direccion">Direccion</label>
                                <input  type="text" class = "form-control" id = "Direccion" name = "Direccion" required>
                                <span class="help-block small">Please repeat your pasword</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Email</label>
                                <input type="" value="" id="Email" class="form-control" name="">
                                <span class="help-block small">Your address email to contact</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Password</label>
                                <input type="password" value="" id="CPassword" class="form-control" name="">
                                <span class="help-block small">Your hard to guess password</span>
                            </div>
                        </div>
                        <div>
                            <button type="button" onclick="register()" class="btn btn-accent">Register</button>
                            <a class="btn btn-default" href="login.php">Login</a>
                        </div>
                    </form>
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
 
<!-- App scripts -->
<script src="scripts/luna.js"></script>
 
<script>
 
    function register() {
   
        let EmpresaRUC = $('#EmpresaRUC').val();
        let NombreEmpresa = $('#NombreEmpresa').val();
        let DNI = $('#DNI').val();
        let NombreCliente = $('#NombreCliente').val();
        let Numero = parseInt($('#Numero').val());
        let Direccion = $('#Direccion').val();
        let Email = $('#Email').val();
        let Contrasena = $('#CPassword').val();
   
        $.ajax({
            url: 'conexion/registro.php',
            type: 'post',
            async: false,
            data: {
                EmpresaRUC: EmpresaRUC,
                NombreEmpresa: NombreEmpresa,
                DNI: DNI,
                NombreCliente: NombreCliente,
                Numero: Numero,
                Direccion: Direccion,
                Email: Email,
                CPassword: Contrasena
            },
            success: function(response) {
                alert('Registro exitoso');
                console.log("Registro exitoso:", response);
                window.location.href = "login.php";
            },
            error: function(xhr, status, error) {
                console.error("Error al crear el usuario:", status, error);
            }
        });
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
 
 
 
</body>
 
 
<!-- Mirrored from webapplayers.com/luna_admin-v1.1/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2016 14:23:25 GMT -->
</html>
tiene menú contextual