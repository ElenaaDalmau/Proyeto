<!DOCTYPE html>
<html lang="es">
     
    <head>
        
        <meta charset="utf-8">
        
        <title> Login </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/estilo.css">

        <!-- Link favicon -->
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

        <!-- Link para que funcionen los FA FA -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    
    <body >
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
                        <label class="label_ME" for="lenguage"></label>
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


<!-- CODIGO -->

        <?php

        if(isset($_REQUEST['Eliminar'])){
                
            $ID_Cliente=$_REQUEST['ID_Cliente'];
        
            $Eliminar="DELETE FROM Clientes WHERE ID_Cliente =$'ID_Cliente';";
            try {

                mysqli_query($conn,$Eliminar);
                
                header("Location:ConfElimCli.php");
                
            } catch(Exception $e) {
                echo "<script>alert('No se puede eliminar el cliente, con informacion asociada'); window.location='GestionCli.php'</script>";
            }
            
        }else{

            if (isset($_REQUEST['DNI'])){
                
                $DNI_Cliente=$_REQUEST['DNI'];

                $sql="SELECT * FROM Clientes WHERE DNI_Cliente= '$DNI_Cliente';";
        
                $resultado=mysqli_query($conn,$sql);

                //! Que estas 
                if(mysqli_num_rows($resultado)>0)
                {
                    $row = mysqli_fetch_assoc($resultado);            
                ?>
                    <div id="contenedor_ME">
                        <div id="central_ME">
                            <div id="modiel">
                                <div class="subtitulo_me">Eliminar los datos del cliente</div>   
                                <form class="form_ME" id="EliminarCliente" action="" method="POST">
                                    <label class="label_ME" for="ID_Cliente">ID:</label>
                                        <input type="text" id="ID_Cliente" name="ID_Cliente" class="caja" value='<?php echo $row['ID_Cliente']?>'>

                                    <label class="label_ME" for="DNI_Cliente">DNI:</label>
                                        <input type="text" id="DNI_Cliente" name="DNI_Cliente" class="caja" required pattern="[0-9]{8}[A-Za-z]{1}" placeholder="DNI" value='<?php echo $row['DNI_Cliente']?>'>

                                    <label class="label_ME" for="Nombre_Cliente">Nombre:</label>
                                        <input type="text" id="Nombre_Cliente" name="Nombre_Cliente" class="caja" autofocus required pattern="[a-zA-Z\s]+" placeholder="Nombre" value='<?php echo $row['Nombre_Cliente']?>'>

                                    <label class="label_ME" for="Apellido_Cliente">Apellidos:</label>
                                        <input type="text" id="Apellido_Cliente" name="Apellido_Cliente" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Apellidos" value='<?php echo $row['Apellido_Cliente']?>'>

                                    <label class="label_ME" for="FechaNacimiento_Cliente">Fecha de Nacimiento:</label>
                                        <input type="date" name="FechaNacimiento_Cliente" id="FechaNacimiento_Cliente" class="caja" placeholder="Fecha Nacimiento (Año - Mes - Dia)" title="Fecha Nacimiento" value='<?php echo $row['FechaNacimiento_Cliente']?>'>

                                    <label class="label_ME" for="NumTelefono_Cliente">Teléfono: </label>
                                        <input type="tel" name="NumTelefono_Cliente"  id="NumTelefono_Cliente" class="caja" required placeholder="Telefono" value='<?php echo $row['NumTelefono_Cliente']?>'>

                                    <label class="label_ME" for="Correo_Cliente">e-Mail:</label>
                                        <input type="email" name="Correo_Cliente" id="Correo_Cliente" class="caja" required placeholder="email" value='<?php echo $row['Correo_Cliente']?>'>

                                    <label class="label_ME" for="TipoVia_Cliente">Tipo de la via:</label>
                                        <input type="text" class="caja" name="TipoVia_Cliente" id="TipoVia_Cliente" placeholder="Escribe el nombre de la via" value='<?php echo $row['TipoVia_Cliente']?>'>
                                    
                                    <label class="label_ME" for="NombreVia_Cliente">Nombre de la via:</label>
                                        <input type="text" class="caja" name="NombreVia_Cliente" id="NombreVia_Cliente" placeholder="Escribe el nombre de la via" value='<?php echo $row['NombreVia_Cliente']?>'>

                                    <label class="label_ME" for="NumeroVia_Cliente">Numero de la via:</label>
                                        <input type="text" class="caja" name="NumeroVia_Cliente" id="NumeroVia_Cliente" placeholder="Escribe el número de la via" value='<?php echo $row['NumeroVia_Cliente']?>'>
                                    
                                    <label class="label_ME" for="Contrasena_Cliente">Contraseña:</label>
                                        <input type="password" name="Contrasena_Cliente" id="Contrasena_Cliente" class="caja"required placeholder="Contrasena" value='<?php echo $row['Contrasena_Cliente']?>'>
                                    
                                    <button type="submit" title="Eliminar" class="boton_ME" name="Eliminar">Eliminar</button>
                                </form>
                                <div class="botoooon_ME">
                                    <a href="GestionCli.php">Volver</a>
                                </div>
                            </div>
                        </div>    
                    </div>

                <?php
                    }else{
                        echo "Cliente no encontrado: " . $sql . "<br>" .mysqli_error($conn);
            }
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



