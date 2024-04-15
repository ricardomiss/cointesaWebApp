<?php
include 'conexionBD.php';
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$estado = $_POST['estado'];

$query = "INSERT INTO admin VALUES('$usuario','$contrasena','$nombre','$apellido','$estado')";
$conexion->query($query);
header('Location: ../system/usuarios.php');
?>