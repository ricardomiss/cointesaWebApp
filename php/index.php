<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>°</title>
</head>
<body>
	<?php 
	include 'conexionBD.php';
	include 'obtenerAdmin.php';
	include 'obtenerArticulo.php';
	include 'obtenerComentario.php';
	include 'obtenerContador_articulo.php';
	include 'obtenerMarcas.php';
	include 'obtenerProducto.php';
	include 'obtenerproductos_detalles.php';
	include 'obtenerServicios.php';

	//include 'registrarProductos.php';

	?>
	<h1>Admin</h1>
	<form name="form1" method="POST">
		<input type="text" name="usuario"/><br><br>
		<input type="text" name="contrasena"/><br><br>
		<input type="text" name="nombre"/><br><br>
		<input type="text" name="apellido"/><br><br>
		<input type="text" name="estado"/><br><br>
		<button>ENVIAR</button>
	</form>
	<br>
	<h1>Articulos</h1>
	<form name="form2" method="POST" enctype="multipart/form-data">
		<input type="text" name="titulo"/><br><br>
		<input type="date" name="fecha"/><br><br>
		<input type="text" name="contenido"/><br><br>
		<input type="file" name="imagen"/><br><br>
		<input type="text" name="disponible"/><br><br>
		<select name="usuario">
			<option value="admin">admin</option>
		</select><br><br>
		<button>ENVIAR</button>
	</form>
	<br>
	<h1>Comentarios</h1>
	<form name="form3" method="POST">
		<input type="text" name="nombre"/><br><br>
		<input type="number" name="telefono"/><br><br>
		<input type="text" name="correo"/><br><br>
		<input type="text" name="asunto"/><br><br>
		<input type="text" name="mensaje"/><br><br>
		<button>ENVIAR</button>
	</form>
	<br>
	<h1>Marcas</h1>
	<form name="form4" method="POST">
		<input type="text" name="nombre"/><br><br>
		<input type="text" name="descripcion"/><br><br>
		<button>ENVIAR</button>
	</form>
	<br>
	<h1>Servicios</h1>
	<form name="form5" method="POST">
		<input type="text" name="nombre"/><br><br>
		<input type="text" name="descripcion"/><br><br>
		<input type="number" name="garantia"/><br><br>
		<input type="text" name="detalles"/><br><br>
		<input type="number" name="disponible"/><br><br>
		<input type="number" name="precio"/><br><br>
		<input type="text" name="usuario"/><br><br>
		<button>ENVIAR</button>
	</form>
	<br>
	<h1>Productos</h1>
	<form name="form5" method="POST" enctype="multipart/form-data">
		<input type="text" name="nombre"/><br><br>
		<input type="number" name="precio"/><br><br>
		<input type="number" name="disponible"/><br><br>
		<input type="date" name="fecha"/><br><br>
		<input type="text" name="usuario"/><br><br>
		<input type="text" name="descripcion"/><br><br>
		<input type="number" name="id_marca"/><br><br>
		<input type="text" name="modelo"/><br><br>
		<input type="number" name="garantia"/><br><br>
		<input type="text" name="upc"/><br><br>
		<input type="text" name="detalles"/><br><br>
		<input type="file" name="imagen"/><br><br>
		<button>ENVIAR</button>
	</form>
</body>
</html>