<?php 
include 'conexionBD.php';
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$contenido = $_POST['correo'];
$disponible = $_POST['asunto'];
$usuario = $_POST['mensaje'];
$fecha = date("Y-m-d H:i:s");

$query = "INSERT INTO comentarios(nombre,telefono,correo,asunto,mensaje,fecha) VALUES('$nombre','$telefono','$contenido','$disponible','$usuario','$fecha')";
try{
	$resultado = $conexion->query($query);
	if ($resultado) {
        #echo '<script language="javascript">alert("Subido correctamente");</script>';
        header("Location: ../contactanos.php");
        exit();
    } else {
        throw new Exception($conexion->error);
    }
}
catch(Exception $e){
	echo '<script language="javascript">alert("' . $e->getMessage() . '");</script>';
}
?>