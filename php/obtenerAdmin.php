<?php 
$query = "SELECT * FROM admin";
$datos = $conexion->query($query);
$arrayDatos = array();
while($row = mysqli_fetch_array($datos)){
    $arrayDatos[] = $row;
}
$finaldatos = json_encode($arrayDatos);
echo '<script language="javascript">console.log(' . $finaldatos . ');</script>';
?>
