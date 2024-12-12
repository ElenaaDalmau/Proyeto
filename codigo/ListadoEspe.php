<?php
session_start();
include("./GestionBD/1-conexion.php");
?>

<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="utf-8">
    <title>Listado Especialista</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">


    <!--<script src="script_listado.js" defer></script>-->
    
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/estilo.css">

        <!-- Link favicon -->
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

        <!-- Link para que funcionen los FA FA -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body class="fondo">
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



<!-- Listado de especialistas -->
<div class="titulos">Listado de especialistas</div>
<div id="fondo_listado">
    <?php
    $sql = "SELECT E.Nombre_Especialista, E.Apellido_Especialista, ES.Especialidad_Especialista, E.Cuota_Especialista
            FROM ESPECIALISTAS E
            JOIN ESPECIALISTA_ESPECIALIDAD EE ON E.ID_Especialista = EE.ID_Especialista_EspeEspe
            JOIN ESPECIALIDAD ES ON EE.ID_Especialidad_EspeEspe = ES.ID_Especialidad";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) { // Si encuentra resultados
        $Final = 0;
        $row = mysqli_fetch_assoc($result);
        while ($row) { 
            $Esp_Anterior = $row['Nombre_Especialista'];
            echo '<div class="especialista-contenedor">';
                echo '<h5>Especialista: '.$row['Nombre_Especialista'].' '.$row['Apellido_Especialista'].'</h5>';
                echo '<p>Cuota: '.$row['Cuota_Especialista'].'€</p>';
                echo '<ul>';
                    // Agrupar especialidades por especialista
                    $i = 1;
                    while ($row && $Esp_Anterior == $row['Nombre_Especialista']) {
                        echo '<li>Especialidad '.$i.': '.$row['Especialidad_Especialista'].'</li>';
                        $Final++;
                        $i++;
                        $row = mysqli_fetch_assoc($result); // Avanzar a la siguiente fila
                    }
                echo '</ul>';
                echo '<a href="PedirCita.php"><input type="button" id="cantidad4" name="Añadir4" class="boton" value="Pedir Cita"></a>';
            echo '</div>';


            /*if ($_SESSION['usuario'] == "Admin") { // Si es Admin, mostrar opciones adicionales
                echo '<br><a href="ModificarEspecialista.php?id='.$Esp_Anterior.'">Modificar</a>';
                echo '<br><a href="EliminarEspecialista.php?id='.$Esp_Anterior.'">Eliminar</a>';
            }
            echo '</div>';
            echo '<br>';*/
        }
    } else {
        echo '<p>No se encontraron especialistas.</p>';
    }
    ?>
</div>

<!-- PIE DE PAGINA -->
<footer>
    Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>

    <!-- Link a JavaScript -->
    <script src="JS/traducciones.js"></script>

</body>
</html>