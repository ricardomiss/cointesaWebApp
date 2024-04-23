<?php
$id = $_GET['id'];
include '../php/conexionBD.php';
$query = "SELECT * FROM servicios WHERE id_servicios = $id";
$resultado = $conexion->query($query);
$servicio= $resultado->fetch_assoc();

include './shared/layout.php';
?>
<div class="content flex-grow-1">
    <div class="container">
        <h1 class="text-center">Equipo: <?php echo $servicio['nombre'] ?></h1>
        <form method="POST" action="../php/registrarServicios.php">
            <button class="btn btn-primary">Guardar</button>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="usuario" value="<?php echo $servicio['usuario'] ?>">
            <div class="form-group">
                <label for="nombre">Nombre del Servicio</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" value="<?php echo $servicio['nombre'] ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion del Servicio</label>
                <input class="form-control" id="descripcion" name="descripcion" value="<?php echo $servicio['descripcion'] ?>"></input>
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
                <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio del servicio" value="<?php echo $servicio['precio'] ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Detalles</label>
                <textarea class="form-control" id="detalles" name="detalles" rows="3"><?php echo $servicio['detalles'] ?></textarea>
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