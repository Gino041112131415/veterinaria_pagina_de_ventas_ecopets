<!DOCTYPE html>
<html>

<!-- Mirrored from webapplayers.com/luna_admin-v1.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2016 14:23:15 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Page title -->
    <title>Iniciar Sesión</title>
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
    <link rel="stylesheet" href="styles/login.css">
</head>
<body class="blank">

<!-- Wrapper-->
<div class="wrapper">


    <!-- Main content-->
    <section class="content">
        <div class="back-link">
            <a href="index.php" class="btn btn-accent">Regresar al inicio</a>
        </div>

        <div class="container-center animated slideInDown">
        <div class="view-header">
            <center>
                <img src="images/ecopets.png" alt="Master in Pets" width="30%">
            </center>
            <br>
            <div class="view-header">   
                <div class="header-title">
                    <h3>Login</h3>
                    <small>
                        Please enter your credentials to login.
                    </small>
                </div>
            </div>

            <div class="panel panel-filled">
                <div class="panel-body">
                <form id="loginForm">
                        <div class="form-group">
                            <label for="Email" class="form-label">Email / Usuario</label>
                            <input type="text" class="form-control" id="Email" name="Email" placeholder="example@gmail.com" title="Please enter your username" autofocus required>
                            <span class="help-block small">Ingresa con tu email</span>
                        </div>
                        <div class="form-group">
                            <label for="CPassword" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="CPassword" name="CPassword" title="Please enter your password" placeholder="******" required>
                            <span class="help-block small">Ingresa tu contraseña</span>
                        </div>
                        <div>
                            <center>
                                <button type="button" class="btn btn-accent" onclick="iniciar_sesion()">Login</button>
                                <a class="btn btn-default" href="registro.php">Crear Cuenta</a>
                            </center>
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
<script src="js/luna.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 

<script>
function iniciar_sesion() {
    var email = $('#Email').val();
    var password = $('#CPassword').val();
    
    console.log("Email:", email);  // Añadir depuración
    console.log("Password:", password);  // Añadir depuración
    
    $.ajax({
        url: 'conexion/controlador.php',
        type: 'POST',
        data: {
            Email: email,
            CPassword: password
        },
        success: function(response) {
            console.log("Respuesta del servidor:", response);  // Añadir depuración
            if (response.trim() === 'success') {
                window.location.href = 'index.php';
            } else {
               alert('Credenciales incorrectas');
            }
        },
        error: function() {
            alert('Error en la conexión con el servidor');
        }
    });
}
</script>

</body>


<!-- Mirrored from webapplayers.com/luna_admin-v1.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2016 14:23:15 GMT -->
</html>