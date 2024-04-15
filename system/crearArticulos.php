<?php
include './shared/layout.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$row = array();
if ($id != '') {
    include '../php/conexionBD.php';
    $query = "SELECT * FROM articulos WHERE id_articulo = $id";
    $resultado = $conexion->query($query);
    $row = $resultado->fetch_assoc();
}
?>
<div class="content flex-grow-1">
    <div class="container">
        <h1 class="text-center"><?php echo $id != '' ? "Modificando Articulo: " . $id : 'Crear Articulo'; ?></h1>
        <form action="../php/insertarArticulo.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?php echo $id != '' ? $id : ''; ?>">
            <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($row['usuario']) ? $row['usuario'] : ''; ?> ">
            <input type="hidden" name="fecha" id="fecha" value="<?php echo isset($row['fecha']) ? $row['fecha'] : ''; ?> ">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo isset($row['titulo']) ? $row['titulo'] : ''; ?> ">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="fecha">¿Disponible?</label>
                    <select class="form-control" id="disponible" name="disponible">
                    <option value="1" <?php echo isset($row['disponible']) && $row['disponible'] == 1 ? 'selected' : ''; ?>>Si</option>
                    <option value="0" <?php echo isset($row['disponible']) && $row['disponible'] == 0 ? 'selected' : ''; ?>>No</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="titulo">Portada</label>
                    <input type="file" class="form-control" id="portada" name="portada" accept="image/*" <?php echo $id != '' ? '' : 'required'; ?>>
                </div>
                <div id="imagePreviewContainer">
                    <img id="imagePreview" src="#"/>
                </div>
            </div>
            <div class="form-group">
                <textarea name="editor" id="editor" value="<?php echo isset($row['contenido']) ? $row['contenido'] : ''; ?>"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<script>

</script>
<?php
include './shared/footer.php';
?>