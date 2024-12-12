<!DOCTYPE html>
<html lang="es">  
    <head>
        
        <meta charset="utf-8">
        
        <title> Login </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/registro.css">

        <!-- Link favicon -->
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

        <!-- Link para que funcionen los FA FA -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        
        <style>

/* Estilos generales */
body {
    font-family: 'Nunito', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5ebe3;
    color: #5b4636;
}

h2 {
    color: #5b4636;
}

/* Cabecera */
#header {
    background-color: #a4876e;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

#header .logo img {
    height: 40px;
}

#header nav ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

#header nav ul li {
    margin: 0 15px;
}

#header nav ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

.lenguage-selector {
    margin-left: auto;
}

/* Contenedor del formulario */
#registro-especialistas {
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 1200px;
}

.card {
    display: flex;
    flex-direction: column;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    margin: 51px 317px;
    padding: 20px;


}

.login{
    display: flex;
    justify-content: center;
}

.card h2 {
    margin-bottom: 10px;
    justify-content: space-around;
    display: flex;
}

form {
   /* display: grid;*/
    gap: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
}

form label {
    font-weight: bold;
    margin-bottom: 5px;
}

form input[type="text"],
form input[type="email"],
form input[type="tel"],
form input[type="date"],
form input[type="password"],
form input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fdfdfd;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
}

fieldset {
    border: none;
    margin: 0;
    padding: 0;
}

legend {
    font-weight: bold;
    margin-bottom: 10px;
}

input[type="checkbox"] {
    margin-right: 10px;
}

button {
    grid-column: span 3;
    padding: 10px;
    background-color: #5b4636;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #a4876e;
}

.pie-form a {
    text-decoration: none;
    color: #a4876e;
    font-weight: bold;
}

footer {
    text-align: center;
    padding: 20px;
    background-color: #a4876e;
    color: #fff;
    position: fixed;
    width: 100%;
    bottom: 0;
}


    </style>

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


        <!-- En este código relacionamos el usuario con la contraseña para que verifique si existe el usuario y coincide con la contraseña, 
        también si se muestran resultados asociados en la base de datos y son corectos, se dejará abierta la sesion del usuario (que pondremos en todos los php)-->


<!-- REGISTRO USUARIO -->
        <?php 
            if(isset($_POST['AltaEspecialista'])){
                $DNI_Especialista=$_POST['DNI_Especialista'];
                $NumTelefono_Especialista=$_POST['NumTelefono_Especialista'];
                $Correo_Especialista=$_POST['Correo_Especialista'];
                $Nombre_Especialista=$_POST['Nombre_Especialista'];
                $Apellido_Especialista=$_POST['Apellido_Especialista'];
                $Contrasena_Especialista=$_POST['Contrasena_Especialista']; 
                $FechaNacimiento_Especialista=$_POST['FechaNacimiento_Especialista'];
                $NombreVia_Especialista=$_POST['NombreVia_Especialista'];
                $NumeroVia_Especialista=$_POST['NumeroVia_Especialista'];
                $TipoVia_Especialista=$_POST['TipoVia_Especialista'];
                $CuentaBancaria_Especialista=$_POST['CuentaBancaria_Especialista'];
                $Cuota_Especialista=$_POST['Cuota_Especialista'];
              
                $Tipo =  "espe";

                //INSERTAR INFORMACION ESPECIALISTA
                $sql= "INSERT INTO especialistas(DNI_Especialista, Nombre_Especialista, Apellido_Especialista, FechaNacimiento_Especialista, NumTelefono_Especialista, Correo_Especialista, 
                TipoVia_Especialista, NombreVia_Especialista, NumeroVia_Especialista, CuentaBancaria_Especialista, Cuota_Especialista, Contrasena_Especialista, Tipo)
                VALUES ('$DNI_Especialista','$Nombre_Especialista', '$Apellido_Especialista','$FechaNacimiento_Especialista', '$NumTelefono_Especialista', '$Correo_Especialista', '$TipoVia_Especialista', 
                '$NombreVia_Especialista','$NumeroVia_Especialista','$CuentaBancaria_Especialista','$Cuota_Especialista','$Contrasena_Especialista', '$Tipo');";

                mysqli_query($conn, $sql);
                    
                }        

            
            //INSERTAR DISPONIBILIDAD
            $sql= "SELECT ID_Especialista FROM especialistas WHERE DNI_Especialista='$DNI_Especialista';";

            $result=mysqli_query($conn,$sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $id = $row['ID_Especialista'];

                if (isset($_POST['AltaEspecialista'])) {
                    $Lunes = isset($_POST['Lunes']) ? 1 : 0;
                    $Martes = isset($_POST['Martes']) ? 1 : 0;
                    $Miercoles = isset($_POST['Miercoles']) ? 1 : 0;
                    $Jueves = isset($_POST['Jueves']) ? 1 : 0;
                    $Viernes = isset($_POST['Viernes']) ? 1 : 0;

                    $values = []; // Array para almacenar las filas a insertar

                    // Agregar filas según las franjas horarias seleccionadas
                    if (isset($_POST['8:00-9:00'])) {
                        $values[] = "($Lunes, $Martes, $Miercoles, $Jueves, $Viernes, '8:00-9:00', $id)";
                    }
                    if (isset($_POST['9:00-10:00'])) {
                        $values[] = "($Lunes, $Martes, $Miercoles, $Jueves, $Viernes, '9:00-10:00', $id)";
                    }
                    if (isset($_POST['10:00-11:00'])) {
                        $values[] = "($Lunes, $Martes, $Miercoles, $Jueves, $Viernes, '10:00-11:00', $id)";
                    }
                    if (isset($_POST['11:00-12:00'])) {
                        $values[] = "($Lunes, $Martes, $Miercoles, $Jueves, $Viernes, '11:00-12:00', $id)";
                    }
                    if (isset($_POST['15:00-16:00'])) {
                        $values[] = "($Lunes, $Martes, $Miercoles, $Jueves, $Viernes, '15:00-16:00', $id)";
                    }
                    if (isset($_POST['16:00-17:00'])) {
                        $values[] = "($Lunes, $Martes, $Miercoles, $Jueves, $Viernes, '16:00-17:00', $id)";
                    }
                    if (isset($_POST['17:00-18:00'])) {
                        $values[] = "($Lunes, $Martes, $Miercoles, $Jueves, $Viernes, '17:00-18:00', $id)";
                    }
                    if (isset($_POST['18:00-19:00'])) {
                        $values[] = "($Lunes, $Martes, $Miercoles, $Jueves, $Viernes, '18:00-19:00', $id)";
                    }
                    if (isset($_POST['19:00-20:00'])) {
                        $values[] = "($Lunes, $Martes, $Miercoles, $Jueves, $Viernes, '19:00-20:00', $id)";
                    }
                    if (isset($_POST['20:00-21:00'])) {
                        $values[] = "($Lunes, $Martes, $Miercoles, $Jueves, $Viernes, '20:00-21:00', $id)";
                    }

                    // Concatenar todas las filas en la consulta SQL
                    if (!empty($values)) {
                        $sql = "INSERT INTO DISPONIBILIDAD_ESPECIALISTA (Lunes, Martes, Miercoles, Jueves, Viernes, Hora_Dispo, ID_Especialista_DispoEspe) VALUES " . implode(", ", $values) . ";";
                        //echo $sql; // Para depuración

                        if (mysqli_query($conn, $sql)) {
                            echo "Disponibilidad registrada exitosamente.";/*poner alert*/
                            // header("Location: Calendario.php"); // Redirige si es necesario
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    } else {
                        echo "No se seleccionó ninguna franja horaria.";
                    }
                }

                /*ASIGNACION ESPECIALIDADES*/
                
                $sql= "INSERT INTO especialista_especialidad (Id_Especialista_EspeEspe, Id_Especialidad_EspeEspe) VALUES";
                
                if(isset($_POST['CoachingEmpresarial'])){
                    $sql .= "($id, '" . $_POST['CoachingEmpresarial'] . "');";
                }

                if(isset($_POST['CoachingPersonal'])){
                    $sql .= "($id, '" . $_POST['CoachingPersonal'] . "');"; 
                }

                if(isset($_POST['CoachingconInteligenciaEmocional'])){
                    $sql .= "($id, '" . $_POST['CoachingconInteligenciaEmocional'] . "');";
                }

                if(isset($_POST['CoachingDeportivo'])){
                    $sql .= "($id, '" . $_POST['CoachingDeportivo'] . "');";
                }

                if(isset($_POST['CoachingOntológico'])){
                    $sql .= "($id, '" . $_POST['CoachingOntológico'] . "');";
                }
                if(isset($_POST['CoachingCognitivo'])){
                    $sql .= "($id, '" . $_POST['CoachingCognitivo'] . "');";
                }
                if(isset($_POST['CoachingPNL(ProgramaciónNeurolingüística)'])){
                    $sql .= "($id, '" . $_POST['CoachingPNL(ProgramaciónNeurolingüística)'] . "');";
                }
                if(isset($_POST['CoachingCoercitivo'])){
                    $sql .= "($id, '" . $_POST['CoachingCoercitivo'] . "');";
                }
                $sql.=";";
                 echo $sql;    
                
                if (mysqli_query($conn,$sql))
                {
                    header("Location:Calendario.php");
                }
            
                else 
                {
                    echo "Error:  "   . $sql . "<br>" . mysqli_error($conn);
                }
        
            } 
      
        else{
            ?>
             
            
                    <!-- Sección 1: Registro de Especialistas -->
                        <div class="card" div id="registro-especialistas">
                            <h2>Registro de Especialistas</h2>
                            <div id="login">
                                <form id="AltaEspecialista" action="" method="POST">
                                    <label for="DNI_Especialista">DNI:</label>
                                        <input type="text" id="DNI_Especialista" name="DNI_Especialista" class="caja" required pattern="[0-9]{8}[A-Za-z]{1}" placeholder="DNI">
                                    
                                    <label for="Nombre_Especialista">Nombre:</label>
                                        <input type="text" id="Nombre_Especialista" name="Nombre_Especialista" class="caja" autofocus required pattern="[a-zA-Z\s]+" placeholder="Nombre">

                                    <label for="Apellido_Especialista">Apellidos:</label>
                                        <input type="text" id="Apellido_Especialista" name="Apellido_Especialista" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Apellidos">

                                    <label for="FechaNacimiento_Especialista">Fecha de Nacimiento:</label>
                                        <input type="date" name="FechaNacimiento_Especialista" id="FechaNacimiento_Especialista" class="caja" pattern="\[0-9]{4}\-[0-9]{2}\-[0-9]{2}" placeholder="Año-Mes-Dia" title="Fecha Nacimiento">

                                    <label for="NumTelefono_Especialista">Teléfono: </label>
                                        <input type="tel" name="NumTelefono_Especialista"  id="NumTelefono_Especialista" class="caja" pattern="[0-9]{9}" required placeholder="Telefono">

                                    <label for="Correo_Especialista">e-Mail:</label>
                                        <input type="email" name="Correo_Especialista" id="Correo_Especialista" class="caja" required placeholder="email">

                                    <label for="TipoVia_Especialista">Tipo de via:</label>
                                        <input type="text" class="caja" name="TipoVia_Especialista" id="TipoVia_Especialista" pattern="^(C/|Paseo|Av\.)$" placeholder="Escribe el nombre de la via">

                                    <label for="NombreVia_Especialista">Nombre de la via:</label>
                                        <input type="text" class="caja" name="NombreVia_Especialista" id="NombreVia_Especialista" pattern="[a-zA-Z\s]+" placeholder="Escribe el nombre de la via">

                                    <label for="NumeroVia_Especialista">Número de la via:</label>
                                        <input type="number" class="caja" name="NumeroVia_Especialista" id="NumeroVia_Especialista" pattern="[0-9]{9}" placeholder="Escribe el número de la via">

                                    <label for="CuentaBancaria_Especialista">Cuenta bancaria:</label>
                                        <input type="number" class="caja" name="CuentaBancaria_Especialista" id="CuentaBancaria_Especialista" pattern="\ES\[0-9]{22}" placeholder="Escribe su cuenta bancaría">

                                    <label for="Cuota_Especialista">Cuota:</label>
                                        <input type="number" class="caja" name="Cuota_Especialista" id="Cuota_Especialista" pattern="[0-9]{4}\.[0-9]{2}" placeholder="Formato XXXX.XX">
            
                                    <label for="Contrasena_Especialista">Contraseña:</label>
                                        <input type="password" name="Contrasena_Especialista" id="Contrasena_Especialista" class="caja"required placeholder="Escribe tu contraseña">

                                    <label for="espe">Rol:</label>
                                        <input type="text" id="espe" name="espe" pattern="^espe$" title="Rol" required>
                            </div>
                        </div>      

                            <!-- Sección 2: Días y Horarios -->
                        <div class="card" div id="dias-horarios">
                            <h2>Días y Horarios</h2>
                            <form>
                                <fieldset>
                                    <legend>Disponibilidad Diaria</legend>
                                    <label for="Lunes">Lunes</label>
                                    <input type="checkbox" id="Lunes" name="Lunes" value="1" checked>
                                    
                                    <label for="Martes">Martes</label>
                                    <input type="checkbox" id="Martes" name="Martes" value="1" checked>
                                        
                                    <label for="Miércoles">Miércoles</label>
                                    <input type="checkbox" id="Miércoles" name="Miércoles" value="1" checked>
                                        
                                    <label for="Jueves">Jueves</label>
                                    <input type="checkbox" id="Jueves" name="Jueves" value="1" checked>
                                        
                                    <label for="Viernes">Viernes</label>
                                    <input type="checkbox" id="Viernes" name="Viernes" value="1" checked>
                                </fieldset>
                                        
                                <fieldset>
                                    <legend>Horario Laboral</legend>
                                    <label for="8:00-9:00">8:00-9:00</label>
                                    <input type="checkbox" id="8:00-9:00" name="8:00-9:00" value="1">
                                        
                                    <label for="9:00-10:00">9:00-10:00</label>        
                                    <input type="checkbox" id="9:00-10:00" name="9:00-10:00" value="1">
                                    
                                    <label for="10:00-11:00">10:00-11:00</label>
                                    <input type="checkbox" id="10:00-11:00" name="10:00-11:00" value="1">
                                    
                                    <label for="11:00-12:00">11:00-12:00</label>
                                    <input type="checkbox" id="11:00-12:00" name="11:00-12:00" value="1">

                                    <label for="15:00-16:00">15:00-16:00</label>    
                                    <input type="checkbox" id="15:00-16:00" name="15:00-16:00" value="1">
                                    
                                        <label for="16:00-17:00">16:00-17:00</label>
                                    <input type="checkbox" id="16:00-17:00" name="16:00-17:00" value="1">
                                    
                                        <label for="17:00-18:00">17:00-18:00</label>
                                    <input type="checkbox" id="17:00-18:00" name="17:00-18:00" value="1">
                                    
                                        <label for="18:00-19:00">18:00-19:00</label>
                                    <input type="checkbox" id="18:00-19:00" name="18:00-19:00" value="1">
                                    
                                        <label for="19:00-20:00">19:00-20:00</label>
                                    <input type="checkbox" id="19:00-20:00" name="19:00-20:00" value="1">
                                    
                                        <label for="20:00-21:00">20:00-21:00</label>    
                                    <input type="checkbox" id="20:00-21:00" name="20:00-21:00" value="1">
                            </fieldset>
        </div>
                            <!-- Sección 3: Especialidades -->
                            <div class="card"  id="especialidades">
                                <h2>Especialidades</h2>
                                <fieldset>
                                    <legend>Seleccione Especialidades</legend>
                                        <label for="CoachingEmpresarial">Coaching Empresarial</label>
                                    <input type="checkbox" id="CoachingEmpresarial" name="CoachingEmpresariala" value="1">
                                        
                                        <label for="CoachingPersonal">Coaching Personal</label>        
                                    <input type="checkbox" id="CoachingPersonal" name="CoachingPersonal" value="2">
                                    
                                        <label for="CoachingconInteligenciaEmocional">Coaching con Inteligencia Emocional</label>
                                    <input type="checkbox" id="CoachingconInteligenciaEmocional" name="CoachingconInteligenciaEmocional" value="3">
                                    
                                        <label for="CoachingDeportivo">Coaching Deportivo</label>
                                    <input type="checkbox" id="CoachingDeportivo" name="CoachingDeportivo" value="4">
                                    
                                        <label for="CoachingOntológico'">Coaching Ontológico</label>    
                                    <input type="checkbox" id="CoachingOntológico" name="CoachingOntológico" value="5">
                                    
                                        <label for="CoachingCognitivo">Coaching Cognitivo</label>
                                    <input type="checkbox" id="CoachingCognitivo" name="CoachingCognitivo" value="6">
                                    
                                        <label for="CoachingPNL(ProgramaciónNeurolingüística)">Coaching PNL (Programación Neurolingüística)</label>
                                    <input type="checkbox" id="CoachingPNL(ProgramaciónNeurolingüística)" name="CoachingPNL(ProgramaciónNeurolingüística)" value="7">
                                    
                                        <label for="CoachingCoercitivo">Coaching Coercitivo</label>
                                    <input type="checkbox" id="CoachingCoercitivo" name="CoachingCoercitivo" value="8">        
                                </fieldset> 
                            </div>
                            
                            <button type="submit" title="AltaEspecialista" name="AltaEspecialista">Alta Especialista</button>
                              
                        </form>
                        <div class="pie-form">
                            <a href="Inicio.php">Volver</a>
                        </div>
                </div>
            </div>

   
<?php
        }
    ?>
    </div> <!-- LOGIN -->
    </div> <!-- CENTRAL -->
    </div> <!-- CONTENEDOR-->

<!-- PIE DE PAGINA -->
    <footer>
        Todos los derechos reservados | Coaching SL Copyright © 2024
    </footer>

    <!-- Link a JavaScript 
    <script src="JS/traducciones.js"></script>-->

    
</body>
</html>