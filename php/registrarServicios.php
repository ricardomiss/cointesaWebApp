<?php
include 'conexionBD.php';
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$garantia = $_POST['garantia'];
$detalles = $_POST['detalles'];
$disponible = $_POST['disponible'];
$precio = $_POST['precio'];
$usuario = $_POST['usuario'];
$fecha = date("Y-m-d H:i:s");

if($id != null || $id != ''){
    $query = "UPDATE servicios SET nombre='$nombre',descripcion='$descripcion',garantia='$garantia',detalles='$detalles',disponible='$disponible',precio='$precio' WHERE id_servicios='$id'";
    $conexion->query($query);
    header("Location: ../system/equipos.php");
}else{
    $query = "INSERT INTO servicios(nombre,descripcion,garantia,detalles,disponible,precio,usuario,fecha) VALUES('$nombre','$descripcion','$garantia','$detalles','$disponible','$precio','$usuario','$fecha')";
    $conexion->query($query);
    header("Location: ../system/equipos.php");
}
?>