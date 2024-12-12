<!-- CONEXION -->
<?php
    session_start();
    include("./GestionBD/1-conexion.php");
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        
        <title> Confirmacion Eliminar </title>    
        
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
   
    <body class="confirmaciones_fondo"> 
    <!-- CONFIRMACION ELIMINAR -->
    <div class="confirmacion_cajagrande">
            <div class="central">
                <div class="conf_fafa">
                    <i class="fa-solid fa-trash-can"></i>
                </div>
                <h1 class="conf_titulo">Acción realizada correctamente</h1>
                <div class="titulo">
                    <?php
                        echo "<p>Se ha eliminado correctamente el cliente seleccionado.</p>";
                    ?>
                    </div>
                            
                    <div class="pie-form">
                        <a class="Confirmacion_boton" href="ComoTrabajamos.php">Continuar</a>
                    </div>   
                </div>
            </div>  
    
    </body>
</html>
