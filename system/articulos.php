<?php
include './shared/layout.php';
?>
<div class="content flex-grow-1">
    <div class="container">
        <h1 class="text-center">Articulos</h1>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO. Articulo</th>
                            <th>Titulo</th>
                            <th>Publicado</th>
                            <th>Autor</th>
                            <th>¿Disponible?</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../php/conexionBD.php';
                        $query = "SELECT * FROM articulos";
                        $resultado = $conexion->query($query);
                        while ($row = $resultado->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['id_articulo'] ?></td>
                                <td><?php echo $row['titulo'] ?></td>
                                <td><?php echo $row['fecha'] ?></td>
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
                                    <a href="../articulo.php?id=<?php echo $row['id_articulo'] ?>" class="btn btn-primary btn-sm">Ver</a>
                                    <a href="./crearArticulos.php?id=<?php echo $row['id_articulo'] ?>" class="btn btn-info btn-sm">Editar</a>
                                    <a href="../php/cambiarDisponible.php?id=<?php echo $row['id_articulo'] ?>&disponible=<?php echo $row['disponible'] ?>" class="btn <?php echo $row['disponible'] == 1 ? "btn-success" : "btn-secondary"; ?> btn-sm"><?php echo $row['disponible'] == 1 ? "Ocultar" : "Mostrar"; ?></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="./crearArticulos.php" class="btn btn-primary">Crear Articulo</a>
            </div>
        </div>
    </div>
</div>
<?php
include './shared/footer.php';
?>