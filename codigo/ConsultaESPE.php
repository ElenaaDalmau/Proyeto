
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contacto</title>
    
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/estilo.css">

        <!-- Link favicon -->
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

        <!-- Link para que funcionen los FA FA -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body>

<!-- CONEXION -->
        <?php
            session_start();
            include("./GestionBD/1-conexion.php");
        ?>

<!--CABECERA-->
<div id="header">
        <div class="logo">
            <img src="img/logo.png" alt="COACHING SL">
        </div>
        <nav>
            <ul>
                <li><a href="Inicio.php"><i class="fa fa-home"></i> <span data-translate="inicio">Inicio</span></a></li>
                <li><a href="ComoTrabajamos.php"><i class="fa fa-briefcase"></i> <span data-translate="como_trabajar">¿Quiénes somos?</span></a></li>
                <li><a href="Contacto.php"><i class="fa fa-phone-square"></i> <span data-translate="contacto">Puesta en contacto</span></a></li>
                <li><a href="ListadoEspecialistas.php"><i class="fa fa-address-book"></i> <span data-translate="especialistas">Especialistas</span></a></li>
                <li><a href="Calendario.html"><i class="fa fa-calendar"></i> <span data-translate="calendario">Calendario</span></a></li>
                <li>               
                    <div class="lenguage-selector">
                        <label for="lenguage"></label>
                        <select name="lenguage" id="lenguage">
                            <option value="es" data-translate="espanol">Español</option>
                            <option value="ca" data-translate="catalan">Catalan</option>
                            <option value="en" data-translate="ingles">Inglés</option>
                            <option value="fr" data-translate="frances">Francés</option>
                            <option value="it" data-translate="italiano">Italiano</option>
                            <option value="eu" data-translate="euskera">Euskera</option>
                            <option value="gl" data-translate="gallego">Gallego</option>
                            <option value="su" data-translate="sueco">Sueco</option>
                        </select>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

<!-- FORMULARIO -->

    <div class="contacto">
        <h1>Contacta con Nosototras</h1>
        <form id="contactoFor" method="POST">
            <div class="FormularioContact">
                <label for="Nombre">Nombre:</label>
                <input type="text" id="Nombre" name="Nombre" required>
            </div>
            <div class="FormularioContact">
                <label for="Apellido">Apellido</label>
                <input type="text" id="Apellido" name="Apellido" required>
            </div>
            <div class="FormularioContact">
                <label for="email">Correo:</label>
                <input type="email" id="Correo" name="Correo" required>
            </div>
            <div class="FormularioContact">
                <label for="Asunto">Asunto:</label>
                <input type="text" id="Asunto" name="Asunto" required>
            </div>
            <div class="FormularioContact">
                <label for="message">Mensaje:</label>
                <textarea id="Mensaje" name="Mensaje" rows="5" required></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
        <?php
// Importar PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Requiere PHPMailer (asegúrate de ajustar la ruta si usas Composer o manualmente)
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y sanitizar los datos recibidos del formulario
    $nombre = filter_var($_POST['Nombre'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['Apellido'], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL);
    $asunto = filter_var($_POST['Asunto'], FILTER_SANITIZE_STRING);
    $mensaje = htmlspecialchars($_POST['Mensaje']);

    if ($correo) {
        // Configurar PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'tu_correo@gmail.com'; // Tu correo de Gmail
            $mail->Password = 'tu_contraseña_o_token_de_aplicación'; // Contraseña o token de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encriptación TLS
            $mail->Port = 587; // Puerto SMTP

            // Configurar los datos del correo
            $mail->setFrom($correo, "$nombre $apellido"); // Correo del remitente
            $mail->addAddress('coachingslsants@gmail.com'); // Correo del destinatario
            $mail->addReplyTo($correo, "$nombre $apellido"); // Correo para responder

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body = "
            <html>
            <head>
                <title>Mensaje desde el formulario de contacto</title>
            </head>
            <body>
                <p><strong>Nombre:</strong> $nombre $apellido</p>
                <p><strong>Correo:</strong> $correo</p>
                <p><strong>Asunto:</strong> $asunto</p>
                <p><strong>Mensaje:</strong></p>
                <p>$mensaje</p>
            </body>
            </html>";
            $mail->AltBody = "Nombre: $nombre $apellido\nCorreo: $correo\nAsunto: $asunto\nMensaje: $mensaje";

            // Intentar enviar el correo
            $mail->send();
            echo "¡Mensaje enviado con éxito!";
        } catch (Exception $e) {
            echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
        }
    } else {
        echo "Por favor, proporciona un correo electrónico válido.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>

    <!-- PONER INICIO PHP Y FINAL


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Aquí puedes enviar un correo o guardar los datos en una base de datos.
    echo "Thank you, $firstName $lastName! Your message has been received. We will contact you at $email.";
} else {
    echo "Invalid request.";
}
    <script src="js/contacto.js"></script>
-->


<!-- PIE DE PAGINA -->
        <footer>
        Todos los derechos reservados | Coaching SL Copyright © 2024
        </footer>

        <!-- Link a JavaScript -->
            <script src="JS/traducciones.js"></script>

    </body>
</html>
