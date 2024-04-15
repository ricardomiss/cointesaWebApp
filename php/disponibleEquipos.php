<?php
include 'conexionBD.php';
$id = $_GET['id'];
$query = "";
switch ($_GET['equipo']) {
    case 0:
        if($_GET['disponible'] == 0){
            $query = "UPDATE servicios SET disponible = 1 WHERE id_servicios = '$id'";
        }else{
            $query = "UPDATE servicios SET disponible = 0 WHERE id_servicios = '$id'";
        }
        break;
    case 1:
        if($_GET['disponible'] == 0){
            $query = "UPDATE productos SET disponible = 1 WHERE id_producto = '$id'";
        }else{
            $query = "UPDATE productos SET disponible = 0 WHERE id_producto = '$id'";
        }
        break;
    default:
        break;
}

$resultado = $conexion->query($query);
if ($resultado) {
    header("Location: ../system/equipos.php");
} else {
    header("Location: ../system/equipos.php");
    //echo "Error al actualizar: " . mysqli_error($conexion);
}
?>