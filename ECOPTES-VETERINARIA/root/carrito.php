<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Pets - Carrito de Compras</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="styles/carrito.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/ecopets.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>

<!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:ecopets@gmail.com">ecopets@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel: 912 928 844">912 928 844</a>
                </div>
                <div>
                    <a class="text-light" href="https://www.facebook.com/EcopetsPeruOficial" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/ecopetsperuoficial/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            
            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                <h1><span style="color: #DAA520;">Eco</span><span style="color: gray;">Pets</span></h1>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill"></div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon position-relative text-decoration-none" href="./carrito.php">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span id="lblCantidadCarrito" class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">0</span>
                    </a>
                    <?php if (!isset($_SESSION['session_email'])): ?>
                        <a class="nav-icon position-relative text-decoration-none" href="./login.php">
                            <i class="fa fa-fw fa-user text-dark mr-3"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light text-dark" style="transform: translate(-50%, -50%) translateY(-10px);">Login</span>
                        </a>
                    <?php else: ?>
                        <div class="d-flex align-items-center">
                            <span class="nav-icon position-relative text-decoration-none mr-3"><?=$_SESSION['session_email'] ?></span>
                            <form action="conexion/controlador.php" method="post">
                                <button name="BtnCerrarSesion" class="btn btn-link nav-icon position-relative text-decoration-none p-0">
                                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light text-dark" style="transform: translate(-50%, -50%) translateY(-10px);">Cerrar Sesión</span>
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
<!-- Close Header -->

     <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="cart-container">
                <div class="product-details">
                <div class="table-responsive">
                    <table class="table responsive">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody id="detalleCarrito">
                        </tbody>
                    </table>
                </div>
                <div class="totals">
                    <h4>Resumen</h4>
                    <p id="total">Total: S/ 0.00</p>
                    <div id="paypal-button-container"></div>
                    <button onclick="cancelarPago()" class="btn btn-danger" style="display: none;">Cancelar</button>
                </div>
            </div>
        </div>
    </section>
 
    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo" style="color: yellow !important;">Eco Pets</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                    <style>
                        .footer-link-list li a:hover {
                            color: yellow;
                        }
                    </style>
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Av. Revolucion, Cercado de Lima 15834
                            <li>
                               <i class="fa fa-phone fa-fw"></i>
                               <a class="text-decoration-none text-light" href="tel:912 928 844">912 928 844</a>
                            </li>
                            <li>
                               <i class="fa fa-envelope fa-fw"></i>
                               <a class="text-decoration-none text-light" href="mailto:ecopets@gmail.com">ecopets@gmail.com</a>
                            </li>
                    </ul>
                </div>
            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.facebook.com/EcopetsPeruOficial"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/ecopetsperuoficial/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            2024 EcoPets
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

 
    <!-- Scripts -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AQRxZaB7yL7uaItEpdStLVvY87zO_BZGJIbEgHOeuckOf0UopGwK205xQMK5Y_rZqiNpVeivwLaIeCL6&currency=USD"></script>

<script>
        $(document).ready(function() {
            cargarCarrito();
            ObtenerCantidad();
        });
 
        function cargarCarrito() {
            $.ajax({
                url: './carrito/controlador_carrito.php',
                method: 'GET',
                success: function(response) {
                    $('#detalleCarrito').html(response);
                    Anadir_Carrito();
                    actualizarTotal();
                    initPayPalButton();
                },
                error: function(xhr, status, error) {
                    console.error('Error al cargar el carrito:', error);
                }
            });
        }
 
        function Anadir_Carrito() {
            $('.incrementar').on('click', function() {
                var id = $(this).data('id');
                var cantidadElem = $('.cantidad[data-id="' + id + '"]');
                var cantidad = parseInt(cantidadElem.text());
                cantidadElem.text(cantidad + 1);
                actualizarSubtotal(id, cantidad + 1);
                actualizarCarrito(id, cantidad + 1);
            });
 
            $('.decrementar').on('click', function() {
                var id = $(this).data('id');
                var cantidadElem = $('.cantidad[data-id="' + id + '"]');
                var cantidad = parseInt(cantidadElem.text());
                if (cantidad > 1) {
                    cantidadElem.text(cantidad - 1);
                    actualizarSubtotal(id, cantidad - 1);
                    actualizarCarrito(id, cantidad - 1);
                }
            });
        }
 
        function actualizarSubtotal(id, cantidad) {
            var precio = parseFloat($('.subtotal[data-id="' + id + '"]').data('precio'));
            var subtotalElem = $('.subtotal[data-id="' + id + '"]');
            subtotalElem.text('S/ ' + (precio * cantidad).toFixed(2));
            actualizarTotal();
        }
 
       
        function actualizarCarrito(id, cantidad) {
            $.ajax({
                url: './carrito/actualizar_carrito.php',
                method: 'POST',
                data: { id: id, cantidad: cantidad },
                success: function(response) {
                    console.log('Carrito actualizado');
                },
                error: function(xhr, status, error) {
                    console.error('Error al actualizar el carrito:', error);
                }
            });
        }
 
        function eliminarProductoDelCarrito(id_producto) {
            $.ajax({
                url: './carrito/eliminar_del_carrito.php',
                method: 'POST',
                data: { id_producto: id_producto },
                success: function(response) {
                    alert(response);
                    cargarCarrito();
                    ObtenerCantidad();
                },
                error: function(xhr, status, error) {
                    console.error('Error al eliminar el producto del carrito:', error);
                }
            });
        }
 
        function actualizarTotal() {
            var total = 0;
            $('.subtotal').each(function() {
                var subtotal = parseFloat($(this).text().replace('S/ ', ''));
                total += subtotal;
            });
            $('#total').text('Total: S/ ' + total.toFixed(2));

            ObtenerCantidad();
        }
 
        function initPayPalButton() {
            document.getElementById('paypal-button-container').innerHTML = '';
    var tasaCambio = 3.80;

    var totalSoles = parseFloat($('#total').text().replace('Total: S/ ', ''));
    var totalDolares = (totalSoles / tasaCambio).toFixed(2);

    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: totalDolares
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Pago completado por ' + details.payer.name.given_name);

                registrarVentaPayPal();
            });
        },
        onError: function(err) {
            console.error('Error al procesar el pago de PayPal:', err);
            alert('Hubo un error al procesar el pago. Por favor, inténtalo de nuevo.');
        }
    }).render('#paypal-button-container');
}

function registrarVentaPayPal() {
    $.ajax({
        url: './carrito/generar_venta.php',
        method: 'POST',
        success: function(response) {
            alert('Venta registrada correctamente: ' + response);
            limpiarCarrito();
        },
        error: function(xhr, status, error) {
            console.error('Error al registrar la venta:', error);
            alert('Hubo un error al registrar la venta.');
        }
    });
}
 
function ObtenerCantidad() {
    $.post('./carrito/cantidad_carrito.php', { }, function(response) {
        document.getElementById('lblCantidadCarrito').innerHTML = response;
        
    });
}

function limpiarCarrito(){
    document.getElementById('detalleCarrito').innerHTML = '';
    ObtenerCantidad();
}
 
</script>

</body>
</html>