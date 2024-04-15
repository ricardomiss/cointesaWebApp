<?php
include './shared/layout.php';

?>
<div class="content flex-grow-1">
    <div class="container">
        <h1 class="text-center">Mensajes</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="tablaMensajes">
                <thead class="thead-dark">
                    <tr>
                        <th>Mensaje NO.</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Asunto</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>                    
                        <?php
                        include '../php/conexionBD.php';
                        $query = "SELECT * FROM comentarios";
                        $result = mysqli_query($conexion, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id_mensaje'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['telefono'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td><?php echo $row['asunto'] ?></td>
                            <td><?php echo strlen($row['mensaje']) > 100 ? substr($row['mensaje'], 0, 75) . '...' : $row['mensaje'] ?></td>
                            <td><?php echo $row['fecha'] ?></td>
                        
                        <td>
                            <button data-toggle="modal" data-target="#readModals" class="btn btn-info mb-2" data-name="<?php echo $row['nombre'] ?>" data-email="<?php echo $row['correo'] ?>" data-subject="<?php echo $row['asunto']?>" data-message="<?php echo $row['mensaje'] ?>" data-date="<?php echo $row['fecha'] ?>">Ver</button>
                            <a href="../php/eliminarMensaje.php?id=<?php echo $row['id_mensaje'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="readModals" tabindex="-1" aria-labelledby="readModalsLabel" aria-hidden="true">
            <?php include './modals/_readModals.php'?>
        </div>
    </div>
</div>
<?php
include './shared/footer.php';
?>