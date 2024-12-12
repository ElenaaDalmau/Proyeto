<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservar cita</title>

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



        <?php

        if(isset($_POST['reservarcita'])){
        /*INFO ESPECIALISTA*/
            $ID_Especialista=$_POST['ID_Especialista'];
            $Nombre_Especialista=$_POST['Nombre_Especialista'];
            $Apellido_Especialista=$_POST['Apellido_Especialista'];
            $Cuota_Especialista=$_POST['Cuota_Especialista'];
        /*INFO CLIENTE*/
            $ID_Cliente=$_POST['ID_Cliente'];
            $Nombre_Cliente=$_POST['Nombre_Cliente'];
            $Apellido_Cliente=$_POST['Apellido_Cliente'];

        /*INFO FORMULARIO*/
            $Espe_escogida=$_POST['Espe_escogida'];

        /*RECOPILAR INFORMACION*/
            $sql_espe="SELECT E.Cuota_Especialista, E.Nombre_Especialista, E.Apellido_Especialista, ES.Especialidad_Especialista
                FROM ESPECIALISTAS E
                JOIN ESPECIALISTA_ESPECIALIDAD EE ON E.ID_Especialista = EE.ID_Especialista_EspeEspe
                JOIN ESPECIALIDAD ES ON ES.ID_Especialista = E.ID_Especialidad_EspeEspe";

            $sql_dispo="SELECT DE.Fecha_Disponibilidad, DE.Hora_Disponibilidad, DE.Disponibilidad_Especialista
                FROM DISPONIBILIDAD_ESPECIALISTA DE
                JOIN ESPECIALISTAS E ON E.ID_Especialista = DE.ID_Especialista_DispoEspe";

            $sql_espe="SELECT E.Cuota_Especialista, E.Nombre_Especialista, E.Apellido_Especialista, ES.Especialidad_Especialista,
                DE.Fecha_Disponibilidad, DE.Hora_Disponibilidad, DE.Disponibilidad_Especialista
                FROM ESPECIALIDAD ES
                JOIN ESPECIALISTA_ESPECIALIDAD EE ON ES.ID_Especialista = E.ID_Especialidad_EspeEspe
                JOIN ESPECIALISTAS E.ID_Especialista = EE.ID_Especialista_EspeEspe
                JOIN DISPONIBILIDAD_ESPECIALISTA DE ON E.ID_Especialista = DE.ID_Especialista_DispoEspe";

            $sql_usr= " SELECT * FROM CLIENTES WHERE ID_Cliente= '$ID_Cliente'; ";

            if (mysqli_query($conn,$Eliminar))
                {
                    header("Location:Pago.php");
                }
            else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        if (isset($_POST['ID_Especialista'])){
            
            $ID_Especialista=$_POST['ID_Especialista'];

            $sql="SELECT * FROM especialistas WHERE ID_Especialista= $ID_Especialista;";


            $resultado=mysql_query($conn,$sql);
            
            if(mysqli_num_rows($resultado)>0)
            {     
            ?>
<!--FORMULARIO HTML-->
            <form action="Pago.php" method="POST">
                <fieldset> <!-- INFO ESPECIALISTA--->
                    <legend>Especialista escogido</legend>
                    <div class="registro"></div>
                    <div class="opciones">
                        <label for="Nombre_Especialista">Nombre:</label>
                            <input type="text" id="Nombre_Especialista" name="Nombre_Especialista" class="caja" value='<?php echo $row['Nombre_Especialista'] ?>'>
                        <label for="Apellido_Especialista">Apellido:</label>
                            <input type="text" id="Apellido_Especialista" name="Apellido_Especialista" class="caja" value='<?php echo $row['Apellido_Especialista'] ?>'>
                        <label for="Cuota_Especialista">Cuota del especialista: </label>
                            <input type="number" name="Cuota_Especialista"  id="Cuota_Especialista" class="caja" value='<?php echo $row['Cuota_Especialista'] ?>'>
                        </div>
                    </div>
                </fieldset>

                <fieldset> <!-- INFO CLIENTE--->
                    <legend>Información personal</legend>
                    <div class="registro">                    
                        </div>
                        <div class="opciones">
                            <label for="Nombre_Cliente">Nombre:</label>
                                <input type="text" id="Nombre_Cliente" name="Nombre_Cliente" class="caja" value='<?php echo $row['Nombre_Cliente'] ?>'>
                            <label for="Apellido_Especialista">Apellido:</label>
                                <input type="text" id="Apellido_Cliente" name="Apellido_Cliente" class="caja" value='<?php echo $row['Apellido_Cliente'] ?>'>
                        </div>
                    </div>
                </fieldset>

                <br>
                <fieldset>
                                <legend>Disponibilidad Diaria</legend>
                                <input type="checkbox" id="Fecha_Dispo" name="Lunes"  value="1" checked>
                                    <label for="Fecha_Dispo">Lunes</label>

                                <input type="checkbox" id="Fecha_Dispo" name="Martes" value="1" checked>
                                    <label for="Fecha_Dispo">Martes</label>

                                <input type="checkbox" id="Fecha_Dispo" name="Miércoles" value="1" checked>
                                    <label for="Fecha_Dispo">Miércoles</label>
                                
                                <input type="checkbox" id="Fecha_Dispo" name="Jueves" value="1" checked>
                                    <label for="Fecha_Dispo">Jueves</label>
                                
                                <input type="checkbox" id="Fecha_Dispo" name="Viernes" value="1" checked>
                                    <label for="Fecha_Dispo">Viernes</label>
                            </fieldset>
                            
                            <fieldset>
                                <legend>Horario Laboral</legend>
                                    <input type="checkbox" id="Hora_Dispo" name="8:00-9:00" value="1">
                                        <label for="Hora_Dispo">8:00-9:00</label>
                                        
                                    <input type="checkbox" id="Hora_Dispo" name="9:00-10:00" value="1">
                                        <label for="Hora_Dispo">9:00-10:00</label>

                                    <input type="checkbox" id="Hora_Dispo" name="10:00-11:00" value="1">
                                        <label for="Hora_Dispo">10:00-11:00</label>

                                    <input type="checkbox" id="Hora_Dispo" name="11:00-12:00" value="1">
                                        <label for="Hora_Dispo">11:00-12:00</label>
                                        
                                    <input type="checkbox" id="Hora_Dispo" name="15:00-16:00" value="1">
                                        <label for="Hora_Dispo">15:00-16:00</label>

                                    <input type="checkbox" id="Hora_Dispo" name="16:00-17:00" value="1">
                                        <label for="Hora_Dispo">16:00-17:00</label>

                                    <input type="checkbox" id="Hora_Dispo" name="17:00-18:00" value="1">
                                        <label for="Hora_Dispo">17:00-18:00</label>

                                    <input type="checkbox" id="Hora_Dispo" name="18:00-19:00" value="1">
                                        <label for="Hora_Dispo">18:00-19:00</label>

                                    <input type="checkbox" id="Hora_Dispo" name="19:00-20:00" value="1">
                                        <label for="Hora_Dispo">19:00-20:00</label>
                                        
                                    <input type="checkbox" id="Hora_Dispo" name="20:00-21:00" value="1">
                                        <label for="Hora_Dispo">20:00-21:00</label>
                            </fieldset>
                <br>

                hacer un bucle de disponibilidad_especialistas

                <br>
                <fieldset>
                    <legend>¿Qué especialidad deseas escoger?</legend>
                    <select name="Especialidad" id="user" required>
                        <optgroup label="Tipos de coaching que ofrecemos">

            <!-- CHECKBOX para ver especialidad -->
                            <option value="Espe_escogida">Coaching Empresarial</option>
                            <option value="Espe_escogida">Coaching Personal</option>
                            <option value="Espe_escogida">Coaching con Inteligencia Emocional</option>
                            <option value="Espe_escogida">Coaching Deportivo</option>
                            <option value="Espe_escogida">Coaching Ontológico</option>
                            <option value="Espe_escogida">Coaching Cognitivo</option>
                            <option value="Espe_escogida">Coaching PNL (Programación Neurolingüística)</option>
                            <option value="Espe_escogida">Coaching Coercitivo</option>
                        </optgroup>
                    </select>
                </fieldset>


                
                <br>
                <input type="checkbox" name="user" required value="Acepto los terminos de la página">
                    <label for="user">Acepto los terminos de la página</label>
                <br>
                <button type="submit" title="reservarcita" name="reservarcita">Enviar</button>
            </form>
        <?php
            }else{
                echo "Especialista no encontrado: " . $sql . "<br>" .mysqli_error($conn);
            }
        }
        ?>

<!-- PIE DE PAGINA -->
        <footer>
            Todos los derechos reservados | Coaching SL Copyright © 2024
        </footer>

    <!-- Link a JavaScript -->
    <script src="JS/traducciones.js"></script>


    </body>
</html>