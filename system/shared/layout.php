<?php 
if (!isset($_SESSION['usuario'])) {
    header('Location: ../admin.php');
    exit();
    }     
?>
<!DOCTYPE html>
<html>
<head>
    <title>ADMIN SYSTEM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/main.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="./home.php">
            <img src="../assets/img/COINTESA1.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy"></img>
            Cointesa
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse shadow" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./home.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./articulos.php">Articulos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./equipos.php">Servicios y Equipos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./mensajes.php">Mensajes <span class="badge badge-danger">new</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./usuarios.php">Usuarios</a>
                </li>
                <li>
                    <a class="nav-link" href="../index.php">¡Pagina Web!</a>
                </li>
            </ul>
        </div>
        <div class="text-right">
            <a class="btn btn-danger" href="../php/logout.php">Cerrar sesión</a>
        </div>
    </nav>
    

