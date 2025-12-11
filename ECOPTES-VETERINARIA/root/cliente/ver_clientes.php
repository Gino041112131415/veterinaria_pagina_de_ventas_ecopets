<?php

session_start();

include('../conexion/conexion.php');
 

$conn = conectar();

$num = 0;
$valores = ""; 

$sql = "SELECT A.ID_USUARIO AS ID,A.RAZON_SOCIAL, A.DNI, A.RUC, A.NOMBRE, A.TELEFONO, A.DIRECCION, A.EMAIL, C.NOMBRE_ROL AS ROL FROM CLIENTES A
        INNER JOIN USUARIOS B
        ON A.ID_USUARIO = B.ID_USUARIO
        INNER JOIN ROLES C
        ON B.ID_ROL = C.ID_ROL
        WHERE C.ID_ROL = 1";

$result = mysqli_query($conn, $sql);

while($crow = mysqli_fetch_assoc($result)){
    $valores .= '<tr>'.
                    '<td>'.$crow['RAZON_SOCIAL'].'</td>'.
                    '<td>'.$crow['DNI'].'</td>'.
                    '<td>'.$crow['RUC'].'</td>'.
                    '<td>'.$crow['TELEFONO'].'</td>'.
                    '<td>'.$crow['DIRECCION'].'</td>'.
                    '<td>'.$crow['EMAIL'].'</td>'.
                    '<td>'.$crow['ROL'].'</td>'.
                '</tr>';
    $num++;
}

desconectar($conn);

echo $valores.','.$num;

?>
