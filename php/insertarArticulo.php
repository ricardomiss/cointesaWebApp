<?php
include 'conexionBD.php';
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$contenido = $_POST['editor'];
$disponible = $_POST['disponible'];
$usuario = $_POST['usuario'];
$imagen = '';
if (isset($_FILES['portada']) && $_FILES['portada']['tmp_name'] != '') {
    $imagen = addslashes(file_get_contents($_FILES['portada']['tmp_name']));
}
if($id == null){
    $fecha = date("Y-m-d H:i:s");
    $usuario = $_SESSION['usuario'];
    $query = "INSERT INTO articulos(titulo, fecha, contenido, imagen, disponible, usuario) VALUES('$titulo','$fecha','$contenido','$imagen','$disponible','$usuario')";

}
else{
    if ($imagen == '') {
        // Si la imagen es nula, ejecuta esta consulta
        $query = "UPDATE articulos SET titulo='$titulo', fecha='$fecha', contenido='$contenido', disponible='$disponible', usuario='$usuario' WHERE id_articulo='$id'";
    } else {
        // Si la imagen no es nula, ejecuta esta consulta
        $query = "UPDATE articulos SET titulo='$titulo', fecha='$fecha', contenido='$contenido', imagen='$imagen', disponible='$disponible', usuario='$usuario' WHERE id_articulo='$id'";
    }
}

try{
	$resultado = $conexion->query($query);
	if ($resultado) {
        header("Location: ../system/articulos.php");
    } else {
        throw new Exception($conexion->error);
    }
}
catch(Exception $e){
	echo '<script language="javascript">alert("' . $e->getMessage() . '");</script>';
    //header("Location: ../system/articulos.php");
}

?>