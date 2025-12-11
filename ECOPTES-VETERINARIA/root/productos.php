<?php
session_start();  // Asegurarse de iniciar la sesión
?>

<!DOCTYPE html>
<html>

<!-- Mirrored from webapplayers.com/luna_admin-v1.1/metrics.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2016 14:23:15 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>Gestión de Productos</title>
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
                <li class="active">
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

    <!-- Main content-->
    <section class="content">
        <div class="container-fluid">

            <div class="row m-t-sm">
                <div class="col-md-15">
                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="m-b-xs"><i class="fas fa-box text-warning m-r-xs"></i> Gestión de Productos</h3>
                            <hr/>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12" id="list_productos">
                    <div class="panel panel-filled">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-10"><h5 class="m-t-xs">Productos Registrados</h5></div>
                                <div class="col-sm-2 text-right">
                                    <div class="panel-body buttons-margin">
                                       <a type="button" id="btnAgregar" class="btn btn-primary" data-toggle="modal" data-target="#Registrar_Productos">Agregar Producto</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody id="datos">
                                    </tbody>
                                </table>
                            </div>
                            
                            <br>
                            <div class="text-right font-bold c-white y-value">
                                <div id="val_a">Total Alumnos: 6</div>
                            </div>
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
                <div class="modal-body">
                    <form id="formAgregarProducto" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="nombreProducto">Nombre Producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" required>
                        </div>

                        <div class="form-group">
                            <label for="cantidad">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" step="0.1" required>
                        </div>

                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                        </div>
                        <input type="hidden" id="id" name="id">
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="guardar()" type="button" class="btn btn-primary" id="btnNuevo"
                form="formAgregarProducto" enctype="multipart/form-data">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Actualizar Producto -->
<div class="modal fade" id="Actualizar_Producto" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lblTitulo">Actualizar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formActualizarProducto" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="nombreProducto">Nombre Producto</label>
                        <input type="text" class="form-control" id="nombreActualizar" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stockActualizar" name="stock" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Precio</label>
                        <input type="number" class="form-control" id="precioActualizar" name="precio" step="0.1" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" id="imagenActualizar" name="imagen" accept="image/*">
                    </div>
                    <input type="hidden" id="idActualizar" name="id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="actualizar_form()" type="button" class="btn btn-primary" id="btnActualizar" form="formActualizarProducto" enctype="multipart/form-data">Guardar</button>
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

var valor, editar = 0; 
   
$(document).ready(function() {
    carga_datos();

    // Inicializa el modal al cargar la página, puede ayudar si hay problemas al abrirlo

    $('#btnActualizar').click(function() {
        actualizar_form();
    });

    // Intenta abrir el modal aquí para ver si hay algún error en la consola

});
   
   function guardar(){
        if(editar == 0)
			guardar_form();
		else
		    actualizar_form(); 
		editar = 0;	
   }
   
   function carga_datos(){
		
		$.ajax({ type:"POST",
		         url: "./productos/ver_productos.php", 
                     async: false,
				     success: function(result){
                valor = result.split(',');
            
            }});
        document.getElementById("datos").innerHTML = valor[0];
		document.getElementById("val_a").innerHTML = "Total de productos: " + valor[1];
   }
   
   function eliminar_form(id){
   
		$.ajax({ type:"POST",
		         url: "./productos/eliminar_producto.php", 
                     async: false,
				 data:{id:id},
				     success: function(result){
                valor = result.substring(2,result.length);
            
            }});
			
		Swal.fire({
			  icon: 'ok',
			  title: 'Eliminación de Producto',
			  text: valor
			});
			
		carga_datos();
   
   }
   
   function editar_form(id){
    $.ajax({
        type: "POST",
        url: "./productos/editar_producto.php",
        data: { id: id },  // Asegúrate de que 'id' se envía correctamente
        success: function(data) {
            console.log(data);
            let valores = data.split(',');
            $('#Actualizar_Producto').modal('show');
            // Suponiendo que los datos se devuelven como: producto, precio, imagen, stock
            $("#nombreActualizar").val(valores[0]);
            $("#precioActualizar").val(valores[2]);
            $("#stockActualizar").val(valores[4]);
            $("#idActualizar").val(id);
        },
        error: function(error) {
            console.error('Error al cargar los datos del producto: ', error);
        }
    });
}


function actualizar_form() {
    var formData = new FormData($('#formActualizarProducto')[0]);
    $.ajax({
        url: "./productos/actualizar_producto.php",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response);
            Swal.fire('¡Éxito!', 'Producto actualizado correctamente.', 'success');
            $('#Actualizar_Producto').modal('hide');
            carga_datos();
        },
        error: function() {
            Swal.fire('Error', 'Hubo un problema al actualizar el producto.', 'error');
        }
    });
}


   
   function guardar_form() {
    var formData = new FormData(document.getElementById("formAgregarProducto"));
    
    $.ajax({
        type: "POST",
        url: "./productos/agregar_producto.php",
        data: formData,
        contentType: false,
        processData: false,
        async: false,
        success: function(result) {
            Swal.fire({
                icon: 'success',
                title: 'Registro de Producto',
                text: result
            });
            $('#Registrar_Productos').modal('hide');
            carga_datos();
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un problema al registrar el producto.'
            });
        }
    });
}


   
function cancelar_form(){
    document.getElementById("form").style.display = "none";
    document.getElementById("list_productos").style.display = "block";
    document.getElementById("btnNuevo").style.display = "block";
}

function ver_form(i){
    document.getElementById("id").value = "";
    document.getElementById("nombre").value = "";
    document.getElementById("precio").value = "";
    document.getElementById("imagen").value = "";
    document.getElementById("stock").value = "";
    document.getElementById("form").style.display = "block";
    document.getElementById("list_productos").style.display = "none";
    document.getElementById("btnNuevo").style.display = "none";
    if(i==1){
        document.getElementById("indice").style.display = "block";
    }
}
</script>

</body>
<!-- Mirrored from webapplayers.com/luna_admin-v1.1/metrics.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2016 14:23:15 GMT -->
</html>