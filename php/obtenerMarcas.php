<?php 
include 'conexionBD.php';
$query = "SELECT * FROM marcas";
$datos = $conexion->query($query);
$arrayDatos = array();
while($row = mysqli_fetch_array($datos)){
    $arrayDatos[] = $row;
}
//$finaldatos = json_encode($arrayDatos);
echo json_encode($arrayDatos);
?>
