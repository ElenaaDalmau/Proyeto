<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ComoTrabajamos</title>
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/estilo.css">

        <!-- Link favicon -->
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

        <!-- Link para que funcionen los FA FA -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>

/* Estilos generales */

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
  color: #333;
  background-color: #f5f5f5;
}

a {
  text-decoration: none;
  color: #337ab7;
}

a:hover {
  color: #23527c;
}

/* Cabecera */

#header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

#header .logo {
  margin-bottom: 10px;
}

#header .logo img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
}

#header nav {
  background-color: #444;
  padding: 10px;
  text-align: center;
}

#header nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

#header nav ul li {
  display: inline-block;
  margin-right: 20px;
}

#header nav ul li a {
  color: #fff;
}

#header nav ul li a:hover {
  color: #ccc;
}

/* Contenido */

.INFO {
  background-color: #fff;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.INFO h5 {
  margin-top: 0;
}

.INFO ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.INFO ul li {
  margin-bottom: 10px;
}

/* Botones */

.boton {
  background-color: #337ab7;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.boton:hover {
  background-color: #23527c;
}

/* Pie de página */

footer {
  background-color: #333;
  color: #fff;
  padding: 10px;
  text-align: center;
  clear: both;
}

/* Lenguaje selector */

.lenguage-selector {
  margin-top: 10px;
}

.lenguage-selector select {
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Separadores */

hr {
  border: none;
  height: 1px;
  background-color: #ccc;
  margin: 20px 0;
}




</style>



   </head>


    <body>
<!--CONEXIÓN-->
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


    <hr> <!-- SEPARADOR-->

<!-- SOBRE EL TRABAJO-->
<?php

// Validar conexión a la base de datos
if (!$conn) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Validar que $ID_Cliente esté definido
if (isset($_SESSION['DNI_Cliente'])) {
    $ID_Cliente = $_SESSION['DNI_Cliente'];
} else {
    die("Error: DNI_Cliente no está definido.");
}

// Consulta SQL
$sql_todo = "SELECT E.Cuota_Especialista, E.Nombre_Especialista, E.Apellido_Especialista, ES.Especialidad_Especialista, 
            C.Fecha_Cita, C.Hora_Cita, C.Coste_Cita, Cl.Nombre_Cliente, Cl.Apellido_Cliente, Cl.DNI_Cliente, E.ID_Especialista
    FROM ESPECIALIDAD ES
    JOIN ESPECIALISTA_ESPECIALIDAD EE ON EE.ID_Especialidad_EspeEspe = ES.ID_Especialidad
    JOIN ESPECIALISTAS E ON E.ID_Especialista = EE.ID_Especialista_EspeEspe
    JOIN CITAS C ON C.ID_Especialista_Cita = E.ID_Especialista
    JOIN CLIENTES Cl ON C.ID_Cliente_Cita = Cl.ID_Cliente
    WHERE Cl.DNI_Cliente = '$ID_Cliente';
;";

$result = mysqli_query($conn, $sql_todo);

// Verificar errores en la consulta
if (!$result) {
    die("Error en la consulta SQL: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $Esp_Anterior = $row['Nombre_Especialista'];
        echo '<div class="INFO">';
        echo '<h5>Usuario: ' . $row['Nombre_Cliente'] . ' ' . $row['Apellido_Cliente'] . '</h5>';
        echo '<h5>DNI: ' . $row['DNI_Cliente'] . '</h5>';
        echo '<h5>Especialista: ' . $row['Nombre_Especialista'] . ' ' . $row['Apellido_Especialista'] . '</h5>';
        echo '<p>Cuota: ' . $row['Cuota_Especialista'] . '€</p>';
        echo '<ul>';
        $i = 1;
        echo '<li>Especialidad ' . $i . ': ' . $row['Especialidad_Especialista'] . '</li>';
        echo '</ul>';
        echo '<h5> Cita reservada para el día: ' . $row['Fecha_Cita'] . ' a las ' . $row['Hora_Cita'] . '</h5>';
        echo '<p>Cuota: ' . $row['Coste_Cita'] . '€</p>';
        echo '<a href="Pago.php"><input type="button" id="cantidad4" name="Añadir4" class="boton" value="Pagar Cita"></a>';
        echo '</div>';
    }
} else {
    echo '<p>No se encontraron especialistas.</p>';
}
?>


<hr> <!-- SEPARADOR-->

<!-- PIE DE PAGINA -->
        <footer>
            Todos los derechos reservados | Coaching SL Copyright © 2024
        </footer>
    
    <!-- Link a JavaScript -->
    <script src="JS/traducciones.js"></script>

    </body>
</html>
