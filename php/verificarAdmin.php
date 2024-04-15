<?php
include 'conexionBD.php';
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$query = "SELECT * FROM admin WHERE usuario ='$usuario' AND contrasena = '$contrasena' AND estado = '1'";
$resultado = $conexion->query($query);
if ($resultado->num_rows > 0)
{
	$_SESSION['usuario'] = $usuario;
	header("Location: ../system/home.php");
	
}
else
{
	echo '<script language="javascript">alert("USUARIO O CONTRASEÑA INCORRECTOS");</script>';
	header("Location: ../admin.php");
}
?>