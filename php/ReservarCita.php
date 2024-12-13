<!-- CONEXION -->
<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $database = "coaching";
    $password = "";
    
    /*
    $servername = "localhost";
    $username = "sea";
    $database = "coaching";
    $password = "Pr0j3cts3@";
    */
    
    // Creamos la conexion y seleccionamos la base de datos
    $conn = mysqli_connect($servername, $username, $password,$database);
    // Check connection
    if (!$conn) {
        die("Conexion fallida: " . mysqli_connect_error());
    }      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar cita</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>


<div id="header">
    <div class="logo">
        <img src="../img/logo.png" alt="COACHING SL">
    </div>
    <nav>
        <ul>
            <li><a href="Inicio.php"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
            <li><a href="ComoTrabajamos.php"><i class="fa fa-briefcase"></i> <span>¿Quiénes somos?</span></a></li>
            <li><a href="Contacto.php"><i class="fa fa-phone-square"></i> <span>Contacto</span></a></li>
            <li><a href="ListadoEspecialistas.php"><i class="fa fa-address-book"></i> <span>Especialistas</span></a></li>
            <li><a href="Calendario.html"><i class="fa fa-calendar"></i> <span>Calendario</span></a></li>
        </ul>
    </nav>
</div>
<?php

if (isset($_POST['DNI_Especialista'])) 
{
    $DNI_Especialista = $_POST['DNI_Especialista'];

    // Obtener información del especialista
    $sqlEspecialista = "SELECT * FROM especialistas WHERE DNI_Especialista='$DNI_Especialista';";
    $resultadoEspecialista = mysqli_query($conn, $sqlEspecialista);

    if ($resultadoEspecialista && mysqli_num_rows($resultadoEspecialista) > 0) 
    {

        
        $especialista = mysqli_fetch_assoc($resultadoEspecialista);
        $ID_Especialista = $especialista['ID_Especialista'];
        $Coste= $especialista['Cuota_Especialista'];


        echo '<div class="infoEspecialista">';
        echo '<h2>Especialista</h2>';
        echo '<p>Ha escogido a:</p>';
        echo '<input type="text" value="' . htmlspecialchars($especialista['Nombre_Especialista']) . '" readonly>';
        echo '<input type="text" value="' . htmlspecialchars($especialista['Apellido_Especialista']) . '" readonly>';
        echo '</div>';

          // Consulta para obtener la disponibilidad del especialista
          $sqlDisponibilidad = "SELECT * FROM DISPONIBILIDAD_ESPECIALISTA 
          WHERE ID_Especialista_DispoEspe = 
          (SELECT ID_Especialista FROM especialistas WHERE DNI_Especialista='$DNI_Especialista');";

        // Consulta para obtener la disponibilidad del especialista
        $sqlDisponibilidad = "SELECT * FROM DISPONIBILIDAD_ESPECIALISTA WHERE ID_Especialista_DispoEspe = (SELECT ID_Especialista FROM especialistas WHERE DNI_Especialista='$DNI_Especialista');";
        $resultadoDisponibilidad = mysqli_query($conn, $sqlDisponibilidad);

        if ($resultadoDisponibilidad && mysqli_num_rows($resultadoDisponibilidad) > 0) {
            $diasDisponibles = ["Lunes" => [], "Martes" => [], "Miercoles" => [], "Jueves" => [], "Viernes" => []];
            
            while ($row = mysqli_fetch_assoc($resultadoDisponibilidad)) {
                if ($row['Lunes']) $diasDisponibles["Lunes"][] = $row['Hora_Dispo'];
                if ($row['Martes']) $diasDisponibles["Martes"][] = $row['Hora_Dispo'];
                if ($row['Miercoles']) $diasDisponibles["Miercoles"][] = $row['Hora_Dispo'];
                if ($row['Jueves']) $diasDisponibles["Jueves"][] = $row['Hora_Dispo'];
                if ($row['Viernes']) $diasDisponibles["Viernes"][] = $row['Hora_Dispo'];
            }

            // Recopilamos los días válidos
            foreach ($diasDisponibles as $dia => $horarios) {
                if (count($horarios) > 0) {
                    switch ($dia) {
                        case "Lunes":
                            $DiaValido[] = 1;
                            break;
                        case "Martes":
                            $DiaValido[] = 2;
                            break;
                        case "Miercoles":
                            $DiaValido[] = 3;
                            break;
                        case "Jueves":
                            $DiaValido[] = 4;
                            break;
                        case "Viernes":
                            $DiaValido[] = 5;
                            break;
                        }

                        $data = json_decode(file_get_contents("php://input"), true);
                        
                       // if ($data ['RES']='TRUE') {
                       $id_cliente = $_SESSION['ID_Cliente'];
                       
                       if (isset($_REQUEST['Reservar'])){
                        $dia = $_REQUEST['fecha'];
                        $hora = $_REQUEST['horarios'];
                        $SQL= "INSERT INTO CITAS (Fecha_Cita, Hora_Cita, Coste_Cita, ID_Especialista_Cita, ID_Cliente_Cita) VALUES ('$dia', '$hora', $Coste, $ID_Especialista, $id_cliente);";
                        $result = mysqli_query($conn, $SQL);
                        if ($result){
                            //$SQL= "DELETE FROM DISPONIBILIDAD_ESPECIALISTA WHERE ID_Especialista_DispoEspe = $ID_Especialista AND Hora_Dispo =  $CitaReservada);";
                           //$result = mysqli_query($conn, $SQL);
                       }
                    }
                }
            }

            // Imprimir el formulario de selección de horario
            echo '<form method="POST" action="">';
            echo '<label>Horarios:</label>';
            echo '<select name="horarios">';
            echo '<option> Seleccione un horario</option>';

            foreach ($diasDisponibles as $dia => $horarios) {
                foreach ($horarios as $horario) {
                    echo '<option value="' . htmlspecialchars($horario) . '">' . htmlspecialchars($horario) . '</option>';
                }
            }

            echo '</select><br>';
            echo '<label for="Calendario">Selecciona una fecha:</label>';
            echo '<input type="date" id="Calendario" name="fecha" />';

            // Pasar los días válidos a JavaScript
            echo '<input type="hidden" id="DiaValido" value="' . json_encode($DiaValido) . '" />';
            echo '<input type="hidden" name="DNI_Especialista" value="' . htmlspecialchars($DNI_Especialista) . '">';
            echo '<button type="submit" name="Reservar">Reservar Cita</button>';
            echo '</form>';
        } else {
            echo "No se encontró disponibilidad.";
        }
    } else {
        echo "Especialista no encontrado.";
    }
}
?>

<footer>
    Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>
<script type="text/javascript">
    document.addEventListener('change', function() {
        // Obtener los días válidos desde el campo oculto
        var condicion = JSON.parse(document.getElementById('DiaValido').value);
      
        // Llamar a la función de comprobación de la fecha
        ComprobarFecha(condicion);
    });

    function ComprobarFecha(condicion) {
        const InputFecha = document.getElementById("Calendario");
        const selectedDate = new Date(InputFecha.value); // Convertir la cadena a un objeto Date
        
        const day = selectedDate.getDay();  // Obtener el día seleccionado (0 = Domingo, 1 = Lunes, ..., 6 = Sábado)
        console.log("Días válidos:", condicion);  // Verifica en la consola los días válidos
        console.log("Día seleccionado:", day);  // Muestra el día seleccionado

        // Si el día seleccionado no está en los días válidos, limpiar el campo de fecha y mostrar alerta
        if (!condicion.includes(day)) {
            alert("Por favor, selecciona un día disponible.");
          
            InputFecha.value = "";  // Limpiar el valor si no es un día permitido
        }else{
            fetch("procesar.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"  // Enviar los datos como JSON
            },
            body: JSON.stringify('RES:TRUE')  // Convertir el objeto a JSON
            })
            .then(response => response.json())  // Obtener la respuesta en formato JSON
            .then(data => {
                console.log("Respuesta del servidor:", data);  // Mostrar respuesta del servidor en la consola
                document.getElementById("respuesta").innerHTML = data.message;  // Mostrar mensaje en el HTML
            })
            .catch(error => {
                console.error("Error:", error);  // En caso de error
        });
        
        }
    }
</script>

</body>
</html>
