<?php 
$query = "SELECT * FROM productos_detalles";
$datos = $conexion->query($query);
$arrayMasDatos = array();
while($row = mysqli_fetch_array($datos)){
    $arrayMasDatos[] = $row;
}
$finaldatos = json_encode($arrayMasDatos);
echo '<script language="javascript">console.log(' . $finaldatos . ');</script>';
?>