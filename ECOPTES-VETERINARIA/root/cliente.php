<?php
session_start();
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
    <title>Gestión Clientes</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/ecopets.png">
 
    <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="images/ecopets.png">
 
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
                    <li class=" profil-link">
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
                <li class="inactive">
                    <a href="ventas.php">Ventas</a>
                </li>
                <li class="inactive">
                    <a href="productos.php">Productos</a>
                </li>
                <li class="active">
                    <a href="cliente.php">Clientes</a>
                </li>
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
 
            <div class="row m-t-sm">
                <div class="col-md-15">
                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="m-b-xs"><i class="fas fa-user text-warning m-r-xs"></i> Gestión de Clientes</h3>
                            <hr/>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-12 col-sm-12" id="list_clientes">
                    <div class="panel panel-filled">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-10"><h5 class="m-t-xs">Clientes Registrados</h5></div>
                                <div  class="col-sm-2 text-right">
                                    <div class="panel-body buttons-margin">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Razón Social</th>
                                        <th>DNI</th>
                                        <th>RUC</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                    </tr>
                                    </thead>
                                    <tbody id="datos">
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
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

$(document).ready(function () {
		
		carga_datos();
   
   });
   
   function carga_datos(){
		
		$.ajax({ type:"POST",
		         url: "./cliente/ver_clientes.php", 
                     async: false,
				     success: function(result){
                valor = result.split(',');
            
            }});
        document.getElementById("datos").innerHTML = valor[0];
   }
</script>

 
</body>
</html>
 