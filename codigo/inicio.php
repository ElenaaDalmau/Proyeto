<?php
session_start();
include("./GestionBD/1-conexion.php");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_POST['Registro'])) {
    $DNI_Cliente = $_POST['DNI_Cliente'];
    $Nombre_Cliente = $_POST['Nombre_Cliente'];
    $Apellido_Cliente =$_POST['Apellido_Cliente'];
    $FechaNacimiento_Cliente =  $_POST['FechaNacimiento_Cliente'];
    $NumTelefono_Cliente = $_POST['NumTelefono_Cliente'];
    $Correo_Cliente = $_POST['Correo_Cliente'];
    $TipoVia_Cliente =  $_POST['TipoVia_Cliente'];
    $NombreVia_Cliente =  $_POST['NombreVia_Cliente'];
    $NumeroVia_Cliente =  $_POST['NumeroVia_Cliente'];
    $Contrasena_Cliente =  $_POST['Contrasena_Cliente'];

    $sql = "INSERT INTO CLIENTES 
    (DNI_Cliente, Nombre_Cliente, Apellido_Cliente, FechaNacimiento_Cliente, NumTelefono_Cliente, Correo_Cliente, TipoVia_Cliente,NombreVia_Cliente, NumeroVia_Cliente, Contrasena_Cliente)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssssssss', $DNI_Cliente, $Nombre_Cliente, $Apellido_Cliente, $FechaNacimiento_Cliente, $NumTelefono_Cliente, $Correo_Cliente, $TipoVia_Cliente, $NombreVia_Cliente, $NumeroVia_Cliente, $Contrasena_Cliente);

    if (mysqli_stmt_execute($stmt)) {
        /* header("Location: ComoTrabajamos.php?DNI_Cliente=$DNI_Cliente");*/


/*ESTO ES LO QUE HE MODICIADO, QUE NO UTILIZO EL ROW */
         $_SESSION['DNI_Cliente'] = $DNI_Cliente; 
         $_SESSION['Tipo'] = $Tipo;
         header("Location: ConfAltaUsuario.php");
         exit;

     } else {
         echo "<script>alert('Error al registrar usuario');</script>";
     }
}
if (isset($_POST['Iniciar'])) {
    $DNI_Cliente =  $_POST['DNI_Cliente'];
    $Contrasena_Cliente =  $_POST['Contrasena_Cliente'];

    $sql = "SELECT * FROM CLIENTES WHERE DNI_Cliente = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $DNI_Cliente);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($Contrasena_Cliente === $row['Contrasena_Cliente']) {
            $_SESSION['DNI_Cliente'] = $row['DNI_Cliente'];
            $_SESSION['Tipo'] = $row['Tipo'];
            header("Location: ComoTrabajamos.php");
            exit;
        } else {
            echo "<script>alert('Contraseña incorrecta');</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Navbar</title>
  <link rel="stylesheet" href="CSS/estilo.css">
  <script src="JS/js.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="fondo_globaleess">
<!-- CABECERA -->
<nav class="nav_inicio">
    <div class="container">
        <div id="icon" class="logo">
            <img src="img/logo.png" alt="COACHING SL">
        </div>
        <ul>
            <li><a href="Inicio.php"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="ComoTrabajamos.php"><i class="fa fa-briefcase"></i> ¿Quiénes somos?</a></li>
            <li><a href="Contacto.php"><i class="fa fa-phone-square"></i> Puesta en contacto</a></li>
            <li><a href="ListadoEspe.php"><i class="fa fa-address-book"></i> Especialistas</a></li>
            <li><a href="Calendario.html"><i class="fa fa-calendar"></i> Calendario</a></li>
            <li class="lenguage-selector">
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
            </li>
        </ul>
    </div>
</nav>

      
<!-- Fondo Inicio -->
      <header>
        <div class="container">
          <h1>COACHING SL</h1>
          <p class="frase_inicio">¡Bienvenido a la página que te va a cambiar la forma de ver tu vida!</p>
        </div>
      </header>

      <hr class="highlight"/> <!-- SEPARADOR-->


      <div id="nav-bg"></div>
      

      <section id="about">
        <div class="container">
            <div class="explicacionQueVasAEncontrar">
                <h2>¿Qué vas a encontrar aquí dentro?</h2>
                <p>¿Porqué esta página web y no otra página? ¿Porqué nuestros servicios y no otros? A continuación, te explicaremos el porqué deberías de escogernos a nosotros, y no a cualquier otra empresa:</p>
            </div>

            <hr class="highlight"/> <!-- SEPARADOR-->

            <ul class="GlobalApartadosInfo">
                <li>
                <i class="fa-solid fa-user-tie lock-icon"></i>
                <h4 class="TitulosApartados">1. Ayuda profesional elegida por ti</h4>
                <div class="TextExplApartados">
                    <p>Aquí dentro, podrás escoger entre diversos profesionales aquel que creas que es el indicado para ti.</p>
                </div>
                </li>         
                <li>
                <i class="fa-solid fa-book-open lock-icon"></i>
                <h4 class="TitulosApartados">2. La especialidad que más prefieras</h4>
                <div class="TextExplApartados">
                    <p>Podrás investigar que servicios ofrecemos y, de entre todas las opciones, escoger aquella que creas que se adapta mejor a tus necesidades.</p>
                </div>
                </li>
                <li>
                <i class="fa-regular fa-lightbulb lock-icon"></i>
                <h4 class="TitulosApartados">3. ¿No sabes que hacer?</h4>
                <div class="TextExplApartados">
                    <p>Ofrecemos la posibilidad de contactar con nosotros para pedir consejos. ¡Nosotros siempre estaremos dispuestos a ayudarte!</p>
                </div>
                </li>
        
                <li>
                <i class="fa-solid fa-calendar-days lock-icon"></i>
                <h4 class="TitulosApartados">4. Modificar fechas</h4>
                <div class="TextExplApartados">
                    <p>Si has reservado una cita y, cuando se acerca la fecha, te das cuenta que finalmente no podrás asistir, ¡no te preocupes! Ofrecemos la opción de anular citas programadas sin consecuencias.</p>
                </div>
                </li>
        
                <li>
                <i class="fa-solid fa-lock lock-icon"></i>
                <h4 class="TitulosApartados">5. Privacidad</h4>
                <div class="TextExplApartados">
                    <p>Ofrecemos privacidad con todo aquello que cuentes: nadie se va a enterar de las cosas que comentas o explicas con nuestros especialistas.</p>
                </div>
                </li>
        
                <li>
                <i class="fa-regular fa-credit-card lock-icon"></i>
                <h4 class="TitulosApartados"> 6. Método de pago</h4>
                <div class="TextExplApartados">
                    <p>Podrás escoger que método de pago deseas utilizar, pudiendo pagar en efectivo o desde la web. Ofrecemos la opción de poder pagar una cantidad antes de realizar la sesión.</p>
                </div>
                </li>
            </ul>
        </div>
      </section>

      <hr class="highlight"/> <!-- SEPARADOR-->


    <section class="container2">
        <div class="main">  	
            <input type="checkbox" id="chk" aria-hidden="true">
            <div class="signup">
                <form method="post">
                    <label class="registroo" for="chk" aria-hidden="true">Registro</label>
                    <input class="botoneescabecera" type="text" name="DNI_Cliente" required pattern="[0-9]{8}[A-Za-z]{1}" placeholder="DNI">
                    <input class="botoneescabecera" type="text" name="Nombre_Cliente" required pattern="[a-zA-Z\s]+" placeholder="Nombre">
                    <input class="botoneescabecera" type="text" name="Apellido_Cliente" required pattern="[a-zA-Z\s]+" placeholder="Apellidos">
                    <input class="botoneescabecera" type="date" name="FechaNacimiento_Cliente">
                    <input class="botoneescabecera" type="tel" name="NumTelefono_Cliente" required pattern="[0-9]{9}" placeholder="Telefono">
                    <input class="botoneescabecera" type="email" name="Correo_Cliente" required placeholder="Email">
                    <input class="botoneescabecera" type="text" name="TipoVia_Cliente" pattern="C\/|Av.|Paseo"  placeholder="C/ , Av. , Paseo">
                    <input class="botoneescabecera" type="text" name="NombreVia_Cliente" pattern="[a-zA-Z\s]+" placeholder="Nombre de la vía">
                    <input class="botoneescabecera" type="text" name="NumeroVia_Cliente" pattern="[0-9]{0,3}" placeholder="Número">
                    <input class="botoneescabecera" type="password" name="Contrasena_Cliente" required placeholder="Contraseña">
                    <button class="iniciooobotones"  name="Registro">Registro</button>
                </form>
            </div>

            <div class="login">
                <form method="post">
                    <label for="chk" aria-hidden="true">Iniciar Sesión</label>
                        <input class="botoneescabecera" type="text" name="DNI_Cliente" placeholder="DNI_Cliente" required="">
                        <input class="botoneescabecera" type="password" name="pswd" placeholder="Password" required="">
                    <button class="iniciooobotones"  name="Iniciar">Iniciar Sesión</button>
                </form>
            </div>

        </div>
    </section>

    <footer>
        <p>Coaching SL &copy 2024</p>
    </footer>

</body>
</html>
