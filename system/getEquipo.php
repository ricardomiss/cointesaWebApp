<?php
$id = $_GET['id'];
include '../php/conexionBD.php';
$query = "SELECT DISTINCT label FROM productos_detalles";
$resultado = $conexion->query($query);
$query2 = "SELECT p.*,
marcas.id as id_marca, marcas.nombre as marca_nombre,
productos_detalles.descripcion as descripcion_detalles, productos_detalles.label as etiqueta, 
productos_detalles.modelo, productos_detalles.upc, productos_detalles.garantia, productos_detalles.detalles
FROM productos as p
JOIN productos_detalles ON productos_detalles.id_producto = p.id_producto
JOIN marcas ON marcas.id = productos_detalles.id_marca
WHERE p.id_producto = $id";
$resultado2 = $conexion->query($query2);
$producto = $resultado2->fetch_assoc();

include './shared/layout.php';
?>
<div class="content flex-grow-1">
    <div class="container">
        <h1 class="text-center">Equipo: <?php echo $producto['nombre'] ?></h1>
        <form method="POST" action="../php/registrarProductos.php">
            <button class="btn btn-primary">Guardar</button>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="usuario" value="<?php echo $producto['usuario'] ?>">
            <div class="form-group">
                <label for="nombre">Nombre del producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" value="<?php echo $producto['nombre'] ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion del Producto</label>
                <input class="form-control" id="descripcion" name="descripcion" value="<?php echo $producto['descripcion_detalles'] ?>"></input>
            </div>
            <div class="form-group">
                <label for="precio">Garantia</label>
                <select class="form-control" name="garantia">
                    <option value="0">Sin garantia</option>
                    <option value="1">Con Garantia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="precio">Precio del producto</label>
                <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio del servicio" value="<?php echo $producto['precio'] ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Detalles</label>
                <textarea class="form-control" id="detalles" name="detalles" rows="3"><?php echo $producto['detalles'] ?></textarea>
            </div>
            <div class="row justify-content-between">
                <div class="form-group col-md-4">
                    <label for="marca">Marca</label>
                    <select class="form-control" id="marcaselect" name="id_marca">
                        <option value="<?php echo $producto['id_marca'] ?>">
                        <?php echo $producto['marca_nombre'] ?>
                        </option>
                    </select>
                    <button type="button" class="btn btn-secondary btn-sm mt-3" data-toggle="modal" data-target="#exampleModal">
                        + Nueva Marca
                    </button>
                </div>
                <div class="form-group col-md-4">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $producto['modelo'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="serie">UPC</label>
                    <input type="text" class="form-control" id="upc" name="upc" value="<?php echo $producto['upc'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="etiqueta">Etiqueta</label>
                <select name="label" id="label" style="width: 810px;">
                    <option>Ninguno</option>
                    <?php while ($row = $resultado->fetch_assoc()) { ?>
                        <option value="<?php echo $row['label'] ?>"><?php echo $row['label'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="disponible">Disponible</label>
                <select class="form-control" id="disponible" name="disponible">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
            </div>
        </form> 
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Marca</h5>
            </div>
            <div class="modal-body">
                <form method="POST" id="formularioMarca">
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" class="form-control" id="marca" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                    </div>
                    <button type="button" id="Enviar" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include './shared/footer.php';
?>