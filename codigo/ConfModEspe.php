<!-- CONEXION -->
    <?php
        session_start();
        include("./GestionBD/1-conexion.php");
    ?>

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

    <body class="confirmaciones_fondo">

<!-- CODIGO CONFIRMACION -->
        <div class="confirmacion_cajagrande">
            <div class="central">
                <div class="conf_fafa">
                    <i class="fa-solid fa-pen"></i>
                </div>
                <h1 class="conf_titulo">Modificación confirmada del especialista</h1>
                <div class="titulo">
                    <?php
                    echo "<p>Se ha modificado correctamente el especialista " . htmlspecialchars($especialista['Nombre_Especialista']) . " " . htmlspecialchars($especialista['Apellido_Especialista']) . " con DNI " . htmlspecialchars($especialista['DNI_Especialista']) . ".</p>";
                    ?>
                </div>
                        
                <div class="pie-form">
                    <a class="Confirmacion_boton" href="ComoTrabajamos.php">Continuar</a>
                </div>   
            </div>
        </div> 
    </body>
</html>