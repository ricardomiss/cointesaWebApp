<?php
include 'conexionBD.php';
$id = $_GET['id'];
$query = "";
if($_GET['disponible'] == 0){
    $query = "UPDATE articulos SET disponible = 1 WHERE id_articulo = '$id'";
}else{
    $query = "UPDATE articulos SET disponible = 0 WHERE id_articulo = '$id'";
}
$resultado = $conexion->query($query);
if ($resultado) {
    header("Location: ../system/articulos.php");
} else {
    header("Location: ../system/articulos.php");
    //echo "Error al actualizar: " . mysqli_error($conexion);
}
?>