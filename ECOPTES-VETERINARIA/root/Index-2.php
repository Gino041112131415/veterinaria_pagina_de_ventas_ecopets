<?php
session_start();
?>
 
<!DOCTYPE html>
<html>
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>
 
    <!-- Page title -->
    <title>Plataforma Usuarios</title>
 
    <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="vendor/toastr/toastr.min.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="images/ecopets.png">
 
    <!-- App styles -->
    <link rel="stylesheet" href="styles/pe-icons/pe-icon-7-stroke.css"/>
    <link rel="stylesheet" href="styles/pe-icons/helper.css"/>
    <link rel="stylesheet" href="styles/stroke-icons/style.css"/>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        .extra-content {
            margin-top: 30px;
            padding: 20px;
            background-color: #343a40;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #f1f1f1;
        }
        .extra-content h4 {
            font-weight: 700;
            color: #ffffff;
        }
        .extra-content p,
        .extra-content ul li {
            font-size: 16px;
            color: #dcdcdc;
        }
        .extra-content i {
            color: #57b846;
        }
        .extra-content img.icon {
            width: 24px;
            vertical-align: middle;
            margin-right: 10px;
        }
        .header-title img.logo {
            width: 40px;
            vertical-align: middle;
            margin-right: 10px;
        }
    </style>
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
                <li class="active">
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
                <li class="inactive">
                    <a href="perfil.php">Mi Perfil</a>
                </li>
            </ul>
        </nav>
    </aside>
    <!-- End navigation-->
 
    <!-- Main content-->
    <section class="content">
        <div class="container-fluid">
 
            <div class="row">
                <div class="col-lg-12">
                    <div class="view-header">
                        <div class="pull-right text-right" style="line-height: 14px">
                            <small>EcoPets Plataforma<br>Dashboard<br> <span class="c-white">v.1.0</span></small>
                        </div>
                        <div class="header-icon">
                            <i class="pe page-header-icon pe-7s-paw"></i>
                        </div>
                        <div class="header-title">
                            <img src="images/ecopets.png" class="logo" alt="EcoPets Logo">
                            <h3 class="m-b-xs">EcoPets Plataforma</h3>
                            <small>
                                Bienvenido a la plataforma de usuarios de EcoPets.
                            </small>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
 
            <div class="row">
                <div class="col-lg-12">
                    <div class="extra-content">
                        <h4>¿Por qué elegir EcoPets?</h4>
                        <p>
                            En EcoPets, nos dedicamos a proporcionar los mejores productos para tu mascota.
                        </p>
                        <ul>
                            <li><i class="fa fa-check-circle"></i> Ten Feliz a tu mascota.</li>
                            <li><i class="fa fa-check-circle"></i> Ten a tu mascota saludable.</li>
                            <li><i class="fa fa-check-circle"></i> Da una vida de calidad a tu mascota.</li>
                        </ul>
                        <p>
                            Nos esforzamos por ofrecerte una experiencia eficiente y satisfactoria, ayudándote a enfocar en lo que realmente importa: El bienestar de tus mascotas y el éxito de tu negocio.
                        </p>
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
<script src="vendor/toastr/toastr.min.js"></script>
<script src="vendor/sparkline/index.js"></script>
<script src="vendor/flot/jquery.flot.min.js"></script>
<script src="vendor/flot/jquery.flot.resize.min.js"></script>
<script src="vendor/flot/jquery.flot.spline.js"></script>
 
<!-- App scripts -->
<script src="js/luna.js"></script>
 
</body>
</html>