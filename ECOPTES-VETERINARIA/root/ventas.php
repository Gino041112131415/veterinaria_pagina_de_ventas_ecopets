<?php 
session_start();
include ('./conexion/conexion.php');
include './ventas/graficoventas_barras.php';
include './ventas/graficoventas_lineal.php';
include './ventas/graficoventas_circular.php';?>

<!DOCTYPE html>
<html>

<!-- Mirrored from webapplayers.com/luna_admin-v1.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2016 14:23:15 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="images/ecopets.png">

    <!-- Page title -->
    <title>Dashboard de Ventas</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="vendor/toastr/toastr.min.css"/>

    <!-- App styles -->
    <link rel="stylesheet" href="styles/pe-icons/pe-icon-7-stroke.css"/>
    <link rel="stylesheet" href="styles/pe-icons/helper.css"/>
    <link rel="stylesheet" href="styles/stroke-icons/style.css"/>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/dashboardART.css">

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
                <li class="active">
                    <a href="ventas.php">Ventas</a>
                </li>
                <li class="inactive">
                    <a href="productos.php">Productos</a>
                </li>
                <li class="inactive">
                    <a href="cliente.php">Clientes</a>
                </li>
                <li class="inactive">
                    <a href="perfil.php">Mi Perfil</a>
                </li>
            </ul>
        </nav>
    </aside>
<!-- End navigation-->

    <!-- End main content-->

    <section class="content">
<div class="wrapper">
    <div class="content-wrapper">
        <div class="grid-container">
            <div class="card">
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id='barChart' width="650" height="400" ></canvas>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="lineChart" width="650" height="400"  ></canvas>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <h3 class="table-title"></h3>
                    <table  class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID Venta</th>
                                <th>Usuario</th>
                                <th>Producto</th>
                                <th>RUC</th>
                                <th>Fecha de Venta</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="datos">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card pie-chart">
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="pieChart"  width="500" height="200" ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="vendor/pacejs/pace.min.js"></script>
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/datatables/datatables.min.js"></script>
<script src="js/luna.js"></script>
<script src="vendor/toastr/toastr.min.js"></script>
<script src="vendor/toastr/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
$(document).ready(function () {
    carga_datos();
});

function carga_datos() {
    $.ajax({
        type: "POST",
        url: "./ventas/graficoventas_tabla.php",
        async: false,
        success: function(response) {
            // Insertar el HTML en el elemento con id="datos"
            $('#datos').html(response);
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar los datos:', error);
        }
    });
}
</script>

</section>

<script>

        const nombreG = <?php echo json_encode($nombreG); ?>;
        const Tvendido = <?php echo json_encode($Tvendido); ?>;
        const nombreM = <?php echo json_encode($nombreM); ?>;
        const Rvendido = <?php echo json_encode($Rvendido); ?>;
        const nombreProductos = <?php echo json_encode($nombreProductos); ?>;
        const stockProductos = <?php echo json_encode($stockProductos); ?>;

        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: nombreG,
                datasets: [{
                    label: 'Gráfica de productos vendidos',
                    data: Tvendido,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: nombreM,
                datasets: [{
                    label: 'Ventas Mensuales',
                    data: Rvendido,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: nombreProductos,
            datasets: [{
                label: 'Stock Disponible',
                data: stockProductos,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'STOCK DISPONIBLE',
                    font: {
                        size: 24
                    },
                    padding: {
                        top: 10,
                        bottom: 30,
                        left: 100 // Ajusta este valor para mover el título más a la izquierda
                    }
                }
            }
        }
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>