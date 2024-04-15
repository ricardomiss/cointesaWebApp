<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COINTESA</title>
    <script src="https://kit.fontawesome.com/283335a286.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@700&family=Mulish:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php include 'chatbot.php'?>
    <header class="encabezado">
        <div class="contenedor-navegacion">
            <div class="contenido-navegacion contenedor">
            <img data-src="assets/img/COINTESA1.png" width="50" height="50" alt=""></img>
                <div class="logo">
                    <h2><span class="verde">COINTE</span><span></span><span class="rojo">SA</span></h2>
                </div>
                <nav class="navegacion ocultar">
                    <a href="./">Inicio</a>
                    <a href="conocenos.php">Conocenos</a>
                    <a href="equipo.php">Equipos</a>
                    <a href="contactanos.php">Contactanos</a>
                    <?php
                    if(isset($_SESSION['usuario'])){
                        echo '<a href="./system/home.php">ADMIN SYSTEM</a>';
                    }
                    ?>
                </nav>
                <div class="hamburguesa">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
        <div class="contenido-header">
            <div class="contenedor-encabezado">
                <div class="texto-encabezado">
                    <h2>¡Bienvenidos!</h2>
                    <a href="contactanos.php" class="btn bordes">Contactanos</a>
                </div>
                <video autoplay loop muted>
                    <source src="assets/Fondo tecnológico en 4K.mp4">
                </video>
            </div>
        </div>
    </header>

    <div class="contenedor-nosotros contenedor">
        <div class="texto-nosotros">
            <p class="bienvenida"></p>
            <h1>COINTESA</h1>
            <p>Es una compañía de consultoría y servicios informáticos y tecnológicos.
                Destacamos como empresa líder ya que contamos con el respaldo de importantes éxitos y clientes satisfechos en el ámbito de servicios informáticos.
            </p>
            <a href="#" class="btn btn-rojo">CONOCENOS</a>
        </div>
        <div class="imagenes-nosotros">
            <div class="imagen1">
                <img data-src="assets/img/bu.jpg" alt="mujer comiendo pizza">
            </div>
            <div class="imagenes2">
                <img data-src="assets/img/bu.jpg" alt="mujeres comiendo pizza">
                <img data-src="assets/img/bu.jpg" alt="plato con pasta">
            </div>
        </div>
    </div>

    <section class="menu contenedor">
        <h2 class="texto-platillos">EQUIPOS POPULARES</h2>
        <div class="platillos">
            <?php
            include 'php/conexionBD.php';
            $sql = "SELECT * FROM productos JOIN productos_detalles on productos.id_producto = productos_detalles.id_producto WHERE disponible = 1 ORDER BY productos.id_producto DESC LIMIT 6";
            $result = $conexion->query($sql);
            if($result !== false && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo '<div class="platillo" data-platillo="'.$row['nombre'].'">
                    <img data-src="data:image/jpeg;base64,'. base64_encode($row['foto']) .'">
                    <h2>'.$row['nombre'].'</h2>
                    <p>'.$row['descripcion'].'</p>
                    <div class="precio">
                        <p>$'.$row['precio'].'</p>
                        <button><i class="fas fa-shopping-basket"></i></button>
                    </div>
                </div>';
                }
            }   
            ?>
    </section>
    <br>
    <br>
    <div class="separador">
        <div class="contenido-separador contenedor">
            <h2>Nuestro Objetivo</h2>
            <p>Darle soluciones a tu problemática existente 
                  apoyándote con la más alta eficiencia y calidad
                 de nuestros productos, servicios y conocimientos.</p>
            <a href="#" class="btn btn-verde">Mas información</a>
        </div>
    </div>

    <section class="che contenedor">
        <h2>QUË PODRAS ENCONTRAR?</h2>
        <div class="contenido-2">
            <div class="texto-3">
                <h3>En COINTESA podrás encontrar una amplia gama de productos 
                </h3>
                <p>como PC´s , Laptops, Impresoras,Monitores ,Tablets, Redes, Servidores y mucho mas de las mejores marcas.</p>
                <a href="conocenos.php" class="btn btn-verde">QUIERO SABER MAS</a>
            </div>
            <div class="imagen-ultima">
                <img data-src="/assets/img/hola.jpg" alt="fotografia">
            </div>
        </div>
    </section>

    <div class="formulario-contacto contenedor">

        <div class="informacion-contacto">
            <h3>Contactanos</h3>
            <p><i class="fas fa-map-marker-alt"></i>Coatzacoalcos, Veracruz, Mexico</p>
            <p><i class="fas fa-envelope"></i> GERENCIA@COINTESA.COM.MX</p>
            <p><i class="fas fa-phone-alt"></i>921-212-9413</p>
            <div class="redes-sociales">
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-twitter-square"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </div>

        <form class="formulario">
            <div class="input-formulario">
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Pedro" id="nombre">
            </div>
            <div class="input-formulario">
                <label for="apellidos">Apellido</label>
                <input type="text" placeholder="Pedro" id="apellidos">
            </div>
            <div class="input-formulario">
                <label for="correo">Correo</label>
                <input type="email" placeholder="ejemplo@ejemplo.com" id="correo">
            </div>
            <div class="input-formulario">
                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="+90 543 779 9410" id="telefono">
            </div>
            <div class="input-formulario">
                <label for="mensaje">Mensaje</label>
                <textarea></textarea>
            </div>
            <div class="btn-formulario">
                <input type="submit" class="btn btn-verde" value="Enviar">
            </div>
            
        </form>
    </div>
    <div class="pie-pagina ">
        <div class="contenedor-piepagina contenedor">
            <div class="info">
                <h3>Dirección</h3>
                <p>AV. JUAREZ COATZACOALCOS VER</p>
            </div>
            <div class="info">
                <h3>Días especiales</h3>
                <p>Sabados y Jueves 7am - 11pm</p>
                <p>921-212-9413</p>
            </div>
            <div class="info">
                <h3>Horarios</h3>
                <p>Lunes - Domingo 9am - 5pm</p>
                <div class="redes-sociales redes-pie">
                    <i class="fab fa-facebook-square"></i>
                    <i class="fab fa-twitter-square"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
            
            <div class="info">
                <h3>Noticias</h3>
                <p>suscribete para recibir más noticias</p>
                <input type="email" placeholder="Tu correo">
                <input type="submit" class="btn btn-verde" value="enviar ">
            </div>
            
        </div>
    </div>
    <footer class="footer">
        <p>Todos los derechos reservados &copy; 2024</p>
    </footer>
    <script src="js/app.js"></script>

</body>

</html>