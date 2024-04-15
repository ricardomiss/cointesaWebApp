<?php
include 'conexionBD.php';
$id = $_GET['id'];
$query = "DELETE FROM comentarios WHERE id_mensaje = '$id'";
$resultado = $conexion->query($query);
if ($resultado) {
    header("Location: ../system/mensajes.php");
} else {
    header("Location: ../system/mensajes.php");
}
?>