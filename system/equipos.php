<?php
include './shared/layout.php';
?>
<div class="content flex-grow-1">
    <div class="container">
        <h1 class="text-center">Servicios y Equipos</h1>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Creado</th>
                            <th>Precio</th>
                            <th>Etiqueta</th>
                            <th>Autor</th>
                            <th>Disponible</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../php/conexionBD.php';
                        $query = "SELECT * FROM servicios";
                        $resultado = $conexion->query($query);
                        while ($row = $resultado->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['fecha'] ?></td>
                                <td>$<?php echo number_format($row['precio'], 2, '.', ',') ?> MXN</td>
                                <td>Servicio</td>
                                <td><?php echo $row['usuario'] ?></td>
                                <?php
                                if ($row['disponible'] == 1) {
                                ?>
                                    <td>Si</td>
                                <?php
                                } else {
                                ?>
                                    <td>No</td>
                                <?php
                                }
                                ?>
                                <td class="">
                                    <a href="./archivo.php?id=<?php echo $row['id_servicios'] ?>" class="btn btn-info btn-sm">Editar</a>
                                    <a href="../php/disponibleEquipos.php?id=<?php echo $row['id_servicios'] ?>&disponible=<?php echo $row['disponible'] ?>&equipo=0" class="btn <?php echo $row['disponible'] == 1 ? "btn-success" : "btn-secondary"; ?> btn-sm"><?php echo $row['disponible'] == 1 ? "Ocultar" : "Mostrar"; ?></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <?php
                        include '../php/conexionBD.php';
                        $query = "SELECT p.id_producto, p.nombre,p.precio,p.disponible,p.fecha,p.usuario, pd.descripcion, pd.label 
                        FROM productos as p 
                        JOIN productos_detalles as pd ON pd.id_producto = p.id_producto";

                        $resultado = $conexion->query($query);
                        while ($row = $resultado->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['fecha'] ?></td>
                                <td>$<?php echo number_format($row['precio'], 2, '.', ',') ?> MXN</td>
                                <td><?php echo $row['label'] ?></td>
                                <td><?php echo $row['usuario'] ?></td>
                                <?php
                                if ($row['disponible'] == 1) {
                                ?>
                                    <td>Si</td>
                                <?php
                                } else {
                                ?>
                                    <td>No</td>
                                <?php
                                }
                                ?>
                                <td class="">
                                    <a href="./archivo.php?id=<?php echo $row['id_producto'] ?>" class="btn btn-info btn-sm">Editar</a>
                                    <a href="../php/disponibleEquipos.php?id=<?php echo $row['id_producto'] ?>&disponible=<?php echo $row['disponible'] ?>&equipo=1" class="btn <?php echo $row['disponible'] == 1 ? "btn-success" : "btn-secondary"; ?> btn-sm"><?php echo $row['disponible'] == 1 ? "Ocultar" : "Mostrar"; ?></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <button data-toggle="modal" data-target="#registerModal" class="btn btn-primary">Nuevo Servicio o Equipo</button>
            </div>
        </div>
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <?php include './modals/_registerEquiposModals.php'?>
        </div>
    </div>
</div>
<?php
include './shared/footer.php';
?>