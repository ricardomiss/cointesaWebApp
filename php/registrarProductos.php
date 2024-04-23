<?php
include 'conexionBD.php';
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$disponible = $_POST['disponible'];
$fecha = date("Y-m-d H:i:s");
$usuario = $_POST['usuario'];
$descripcion = $_POST['descripcion'];
$id_marca = $_POST['id_marca'];
$modelo = $_POST['modelo'];
$garantia = $_POST['garantia'];
$upc = $_POST['upc'];
$detalles = $_POST['detalles'];
if(isset($_FILES['imagen'])){
	$imagen= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
}
$etiqueta = $_POST['label'];

if($id != null || $id != ''){
	$query = "UPDATE productos SET nombre='$nombre',precio='$precio',disponible='$disponible' WHERE id_producto='$id'";
	$conexion->query($query);
	$secquery = "UPDATE productos_detalles SET descripcion='$descripcion',id_marca='$id_marca',modelo='$modelo',garantia='$garantia',upc='$upc',detalles='$detalles',label='$etiqueta' WHERE id_producto='$id'";
	$conexion->query($secquery);
	header("Location: ../system/equipos.php");
}else{
	$query = "INSERT INTO productos(nombre,precio,disponible,fecha,usuario) VALUES('$nombre','$precio','$disponible','$fecha','$usuario')";
	try {
		if ($conexion->query($query) === TRUE) {
			$last_id = $conexion->insert_id;
			$secquery = "INSERT INTO productos_detalles(descripcion,id_marca,modelo,garantia,upc,detalles,foto,label,id_producto) VALUES('$descripcion','$id_marca','$modelo','$garantia','$upc','$detalles','$imagen','$etiqueta','$last_id')";
			$conexion->query($secquery);
			header("Location: ../system/equipos.php");
		}else {
			throw new Exception($conexion->error);
		}
	} catch (Exception $e) {
		echo '<script language="javascript"> console.log("something goes wrong :(")</script>';
		echo '<script language="javascript">alert("' . $e->getMessage() . '");</script>';	
	}
}
?>