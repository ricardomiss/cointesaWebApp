<?php
//Importaciones
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
include 'conexionBD.php';

//Variables
$mail = new PHPMailer(true);
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$contenido = $_POST['correo'];
$disponible = $_POST['asunto'];
$usuario = $_POST['mensaje'];
$fecha = date("Y-m-d H:i:s");

//Configuracion del servidor SMTP
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'Smtp.ionos.mx';
$mail->SMTPAuth = true;
$mail->Username = 'pedido@cointesa.com.mx';
$mail->Password = 'Cit#070208459';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;


$query = "INSERT INTO comentarios(nombre,telefono,correo,asunto,mensaje,fecha) VALUES('$nombre','$telefono','$contenido','$disponible','$usuario','$fecha')";
try{

    //Envio de correo
    //Sender
    $mail->setFrom('pedido@cointesa.com.mx', 'SYSCOINTESA');
    //Addressee
    $mail->addAddress('pedido@cointesa.com.mx','Pedido Cointesa');

    //Contenido
    $mail->isHTML(true);
    $mail->Subject = 'Nuevo comentario';
    $mail->Body = '
    <h2>Nombre: '.$nombre.'</h2>
    <h2>Telefono del cliente: '.$telefono.'</h2>
    <h2>Correo del Cliente: '.$contenido.'</h2>
    <br>
    <h2>Asunto: '.$disponible.'</h2>
    <br>
    <h3>'.$usuario.'</h3>
    <br>
    <p><small>Fecha del mensaje: '.$fecha.'</small></p>'
    ;
    //$mail->AltBody = 'Este es el cuerpo del mensaje para clientes de correo que no son HTML';
    $mail->send();

	$resultado = $conexion->query($query);
	if ($resultado) {
        #echo '<script language="javascript">alert("Subido correctamente");</script>';
        header("Location: ../contactanos.php");
        exit();
    } else {
        throw new Exception($conexion->error);
    }
}
catch(Exception $e){
	echo '<script language="javascript">alert("' . $e->getMessage() . '");</script>';
}
?>