<?php
include '../php/conexionBD.php';
$query = "SELECT DISTINCT label FROM productos_detalles";
$resultado = $conexion->query($query);

?>
<div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <select class="form-control" id="opcion-servicio">
                <option selected disabled>Elija una opcion</option>
                <option value="0">Servicio</option>
                <option value="1">Equipo</option>
            </select>
            <div id="Servicios">
                <form method="POST" action="../php/registrarServicios.php">
                    <input type="hidden" name="id">
                    <input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario'] ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre del servicio</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion del servicio</label>
                        <input class="form-control" id="descripcion" name="descripcion" required></input>
                    </div>
                    <div class="form-group">
                        <label for="garantia">Garantia</label>
                        <select class="form-control" name="garantia">
                            <option value="0">Sin garantia</option>
                            <option value="1">Con Garantia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio del servicio</label>
                        <input type="number" class="form-control" id="precio" name="precio" required>
                    </div>
                    <div class="form-group">
                        <label for="detalles">Detalles</label>
                        <textarea class="form-control" id="detalles" name="detalles" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="disponible">Disponible</label>
                        <select class="form-control" name="disponible">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
            <div id="Equipos">
            <form method="POST" action="../php/registrarProductos.php" enctype="multipart/form-data">
                <input type="hidden" name="id">
                <input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario'] ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion del Producto</label>
                        <input class="form-control" id="descripcion" name="descripcion" required></input>
                    </div>
                    <div class="form-group">
                        <label for="garantia">Garantia</label>
                        <select class="form-control" name="garantia">
                            <option value="0">Sin garantia</option>
                            <option value="1">Con Garantia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio del producto</label>
                        <input type="number" class="form-control" id="precio" name="precio" required>
                    </div>
                    <div class="form-group">
                        <label for="detalles">Detalles</label>
                        <textarea class="form-control" id="detalles" name="detalles" required></textarea>
                    </div>
                    <div class="row justify-content-between">
                        <div class="form-group col-md-4">
                            <label for="marca">Marca</label>
                            <select class="form-control" id="marcaselect" name="id_marca">

                            </select>
                            <button type="button" class="btn btn-secondary btn-sm mt-3" data-toggle="modal" data-target="#exampleModal">
                                + Nueva Marca
                            </button>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modelo">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="serie">UPC</label>
                            <input type="text" class="form-control" id="upc" name="upc">
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
                    <div>
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" required>
                    </div>
                    <div class="form-group">
                        <label for="disponible">Disponible</label>
                        <select class="form-control" name="disponible">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
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