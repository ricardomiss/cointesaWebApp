<?php
include 'conexionBD.php';
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$estado = $_POST['estado'];
$query = "UPDATE admin SET contrasena='$contrasena', nombre='$nombre', apellido='$apellido', estado='$estado' WHERE usuario='$usuario'";
$resultado = $conexion->query($query);
if ($resultado) {
    header("Location: ../system/usuarios.php");
}
else {
    header("Location: ../system/usuarios.php");
    //echo "Error al actualizar: " . mysqli_error($conexion);
}
?>