<?php

include('../conexion/conexion.php');

$valores = "";

$conn = conectar();

$num = 0;

$sql = "SELECT A.ID_PRODUCTO AS ID, A.URL_IMAGEN AS IMAGEN, A.NOMBRE AS PRODUCTO, A.PRECIO, A.STOCK FROM PRODUCTOS A";

$result = mysqli_query($conn, $sql);

while($crow = mysqli_fetch_assoc($result)){
    $valores .= '<tr>'.
                    '<td><img src="./images/'.$crow['IMAGEN'].'" style="width: 50px; height: auto;"></td>'.
                    '<td>'.$crow['PRODUCTO'].'</td>'.
                    '<td>'.$crow['PRECIO'].'</td>'.
                    '<td>'.$crow['STOCK'].'</td>'.
                    '<td>'.
                        '<a onclick="editar_form('.$crow['ID'].')" class="btn btn-info btn-sm text-white" title="Editar"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;'.
                        '<a onclick="eliminar_form('.$crow['ID'].')" class="btn btn-danger btn-sm text-white" title="Eliminar"><i class="fa fa-trash"></i></a>'.
                    '</td>'.
                '</tr>';
    $num++;
}

desconectar($conn);

echo $valores.','.$num;

?>
