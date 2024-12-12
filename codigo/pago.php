<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
    <!-- Link hacia el archivo de estilos css -->
    <link rel="stylesheet" href="css/estilo.css">
    <!-- Link favicon -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <!-- Link para que funcionen los FA FA -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="Fondos_Inicios">
    <?php
    session_start();
    include("./GestionBD/1-conexion.php");
    if (!$conn) {
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }
    if (!isset($_SESSION['DNI_Cliente'])) {
        die("Error: DNI_Cliente no está definido.");
    }
    $DNI_Cliente = $_SESSION['DNI_Cliente'];
    $sql_cliente = "SELECT * FROM CLIENTES WHERE DNI_Cliente = '$DNI_Cliente'";
    $resultado_cliente = mysqli_query($conn, $sql_cliente);
    if (!$resultado_cliente || mysqli_num_rows($resultado_cliente) == 0) {
        die("Error: No se encontraron datos del cliente.");
    }
    $cliente = mysqli_fetch_assoc($resultado_cliente);
    $sql_especialista = "SELECT E.Nombre_Especialista, E.Apellido_Especialista, E.Cuota_Especialista
                         FROM CITAS C
                         JOIN ESPECIALISTAS E ON C.ID_Especialista_Cita = E.ID_Especialista
                         WHERE C.ID_Cliente_Cita = (SELECT ID_Cliente FROM CLIENTES WHERE DNI_Cliente = '$DNI_Cliente')
                         LIMIT 1;";
    $resultado_especialista = mysqli_query($conn, $sql_especialista);
    if (!$resultado_especialista || mysqli_num_rows($resultado_especialista) == 0) {
        die("Error: No se encontraron datos del especialista.");
    }
    $especialista = mysqli_fetch_assoc($resultado_especialista);
    ?>
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
                        <input class="botoneescabecera" type="email" name="email" placeholder="Email" required="">
                        <input class="botoneescabecera" type="password" name="pswd" placeholder="Password" required="">
                    <button class="iniciooobotones"  name="Iniciar">Iniciar Sesión</button>
                </form>
            </div>

        </div>
    </section>
    
          
    <!-- Fondo Inicio -->

    
          <hr class="highlight"/> <!-- SEPARADOR-->
    
    
          <div id="nav-bg"></div>
          <section class="espe">
    <div class="container-espe">
        <!-- Sección izquierda -->
        <div class="infoEspecialista">
            <h2>Especialista</h2>
            <p>Ha escogido a:</p>
            <input type="text" id="Nombre_Especialista" value="<?php echo $especialista['Nombre_Especialista']; ?>" readonly>
            <input type="text" id="Apellido_Especialista" value="<?php echo $especialista['Apellido_Especialista']; ?>" readonly>
            <p>Cuota del Especialista:</p>
            <input type="number" id="Cuota_Especialista" value="<?php echo $especialista['Cuota_Especialista']; ?>" readonly>
        </div>

        <!-- Sección derecha -->
        <div class="formularioPago">
            <div class="MetodosPago">
                <h3>Elige tu método de pago</h3>
                <div id="payment-methods">
                    <button class="payment-button active">💳 Tarjeta</button>
                    <button class="payment-button">🏦 Transferencia</button>
                    <button class="payment-button">💲 PayPal</button>
                    <button class="payment-button">📦 Otro</button>
                </div>
            </div>
            <div class="DatosCliente">
                <h3>Datos de pago</h3>
                <label for="Nombre_Cliente">Nombre:</label>
                    <input type="text" id="Nombre_Cliente" value="<?php echo $cliente['Nombre_Cliente']; ?>" readonly>
                <label for="Apellido_Cliente">Apellidos:</label>
                    <input type="text" id="Apellido_Cliente" value="<?php echo $cliente['Apellido_Cliente']; ?>" readonly>
                <label for="DNI_Cliente">DNI:</label>
                    <input type="text" id="DNI_Cliente" value="<?php echo $cliente['DNI_Cliente']; ?>" readonly>
                <label for="Estado_Pago">Estado del Pago:</label>
                    <input type="text" id="Estado_Pago">
                <label for="Fecha_Pago">Fecha de Pago:</label>
                    <input type="date" id="Fecha_Pago">
                <label for="Cantidad_Pago">Cantidad del Pago:</label>
                    <input type="text" id="Cantidad_Pago">

                <div class="terminos_check">
                    <input type="checkbox" name="terminos" value="Acepto los términos de la página" required>
                        <label for="terminos">Acepto los términos de la página</label>
                </div>
                <div class="button_contenedor">
                    <input type="submit" value="Enviar">
                </div>
            </div>
        </div>
    </div>
</section>
    <footer>
        Todos los derechos reservados | Coaching SL Copyright © 2024
    </footer>

    <script>
        // Selecciona todos los botones
        const buttons = document.querySelectorAll('.payment-button');

        // Agrega un evento de clic a cada botón
        buttons.forEach((button) => {
        button.addEventListener('click', () => {
            // Remueve la clase "active" de todos los botones
            buttons.forEach((btn) => btn.classList.remove('active'));
            
            // Agrega la clase "active" al botón presionado
            button.classList.add('active');
        });
        });
    </script>
</body>
</html>
