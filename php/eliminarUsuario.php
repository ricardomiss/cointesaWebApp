<?php
include 'conexionBD.php';
$id = $_GET['id'];
$query = "DELETE FROM admin WHERE usuario = '$id'";
$resultado = $conexion->query($query);
if ($resultado) {
    header("Location: ../system/usuarios.php");
} else {
    header("Location: ../system/usuarios.php");
}
?>