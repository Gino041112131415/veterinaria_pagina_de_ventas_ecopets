<?php

include('../conexion/conexion.php');

$valores = "";

$conn = conectar();

$sql = "SELECT ID_PRODUCTO, NOMBRE, STOCK, PRECIO, URL_IMAGEN FROM productos";
$result = mysqli_query($conn, $sql);

while($crow = mysqli_fetch_assoc($result)){
    $valores .= '<div class="col-md-4 d-flex justify-content-center">'.
                    '<div class="card mb-4 product-wap rounded-0">'.
                        '<div class="card rounded-0">'.
                           '<img src="./images/'.$crow['URL_IMAGEN'].'" class="card-img-top" alt="Imagen de '.$crow['NOMBRE'].'">'.
                            '<div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">'.
                            '</div>'.
                        '</div>'.
                        '<div class="card-body">'.
                            '<a href="shop-single.html" class="h3 text-decoration-none">'.$crow['NOMBRE'].'</a>'.
                            '<ul class="w-100 list-unstyled d-flex justify-content-between mb-0">'.
                                '<li>Stock: '.$crow['STOCK'].'</li>'.
                                '<li class="pt-2">'.
                                    '<span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>'.
                                    '<span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>'.
                                    '<span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>'.
                                    '<span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>'.
                                    '<span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>'.
                                '</li>'.
                            '</ul>'.
                            '<p class="text-center mb-0">S/ '.$crow['PRECIO'].'</p>'.
                            '<button class="btn btn-primary btn-block mt-2 anadir_carrito" data-id="'.$crow['ID_PRODUCTO'].'">Agregar al carrito</button>'.
                        '</div>'.
                    '</div>'.
                '</div>';
}

desconectar($conn);

echo $valores;
?>
