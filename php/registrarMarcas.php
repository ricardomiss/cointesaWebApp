<?php
include 'conexionBD.php';
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

$query = "INSERT INTO marcas(nombre,descripcion) VALUES('$nombre','$descripcion')";
$conexion->query($query);
?>