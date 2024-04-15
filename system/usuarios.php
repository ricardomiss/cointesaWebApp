<?php
include './shared/layout.php';
?>
<div class="content flex-grow-1">
    <div class="container">
        <h1 class="text-center">Usuarios</h1>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Activo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../php/conexionBD.php';
                        $query = "SELECT * FROM admin";
                        $resultado = $conexion->query($query);
                        while ($row = $resultado->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['usuario'] ?></td>
                                <td><?php echo $row['contrasena'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['apellido'] ?></td>
                                <?php
                                if ($row['estado'] == 1) {
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
                                    <button data-toggle="modal" data-target="#editModal" class="btn btn-info" data-user="<?php echo $row['usuario'] ?>" data-pass="<?php echo $row['contrasena'] ?>" data-name="<?php echo $row['nombre'] ?>" data-last="<?php echo $row['apellido']?>" data-state="<?php echo $row['estado'] ?>">Editar</button>
                                    <a href="../php/eliminarUsuario.php?id=<?php echo $row['usuario'] ?>" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <button data-toggle="modal" data-target="#registerModal" class="btn btn-primary">Agregar Usuario</button>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <?php include './modals/_editModals.php'?>
        </div>
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <?php include './modals/_registerModals.php'?>
        </div>
    </div>
</div>
<?php
include './shared/footer.php';
?>