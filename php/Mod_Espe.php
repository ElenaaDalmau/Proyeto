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
<html lang="es">
    
    <head>
         
        <meta charset="utf-8">
        
        <title> Modificacion Cliente </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        


        <!-- Link favicon -->
        <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">

        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="../css/estilo.css">
        <!-- Link hacia el archivo de estilos de bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
        <script src="script.js"></script>

    </head>
    
    <body class="fondo">
        <!-- Link hacia las librerias jsp de bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
           
        <div class="titulo_ME">Modificar Especialista</div>
        <!-- <div id="contenedor2"> -->

<!-- En este código queremos modificar la tabla de articulos, pero como verás no se muestra nada. -->

<?php

if (isset($_REQUEST['Modificar'])) {
    // Aseguramos que los valores del formulario estén en las variables
    
    $DNI_Especialista = mysqli_real_escape_string($conn, $_POST['DNI_Especialista']);
    $Nombre_Especialista = mysqli_real_escape_string($conn, $_POST['Nombre_Especialista']);
    $Apellido_Especialista = mysqli_real_escape_string($conn, $_POST['Apellido_Especialista']);
    $FechaNacimiento_Especialista = mysqli_real_escape_string($conn, $_POST['FechaNacimiento_Especialista']);
    $NumTelefono_Especialista = mysqli_real_escape_string($conn, $_POST['NumTelefono_Especialista']);
    $Correo_Especialista = mysqli_real_escape_string($conn, $_POST['Correo_Especialista']);
    $TipoVia_Especialista = mysqli_real_escape_string($conn, $_POST['TipoVia_Especialista']);
    $NombreVia_Especialista= mysqli_real_escape_string($conn, $_POST['NombreVia_Especialista']);
    $NumeroVia_Especialista = mysqli_real_escape_string($conn, $_POST['NumeroVia_Especialista']);
    $CuentaBancaria_Especialista = mysqli_real_escape_string($conn, $_POST['CuentaBancaria_Especialista']);
    $Cuota_Especialista = mysqli_real_escape_string($conn, $_POST['Cuota_Especialista']);
    $Contrasena_Especialista = mysqli_real_escape_string($conn, $_POST['Contrasena_Especialista']);

    // Preparamos la consulta SQL con valores vinculados
    $sql = "UPDATE ESPECIALISTAS 
            SET DNI_Especialista=?, 
                Nombre_Especialista=?, 
                Apellido_Especialista=?, 
                FechaNacimiento_Especialista=?, 
                NumTelefono_Especialista=?, 
                Correo_Especialista=?, 
                TipoVia_Especialista=?, 
                NombreVia_Especialista=?, 
                NumeroVia_Especialista=?,
                CuentaBancaria_Especialista=?,
                Cuota_Especialista=?,
                Contrasena_Especialista=?
            WHERE DNI_Especialista=?";

    // Usamos mysqli_prepare y mysqli_stmt_bind_param para vincular las variables
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Vinculamos las variables a la consulta preparada
        mysqli_stmt_bind_param($stmt, "sssssssssssss", 
            $DNI_Especialista, 
            $Nombre_Especialista, 
            $Apellido_Especialista, 
            $FechaNacimiento_Especialista, 
            $NumTelefono_Especialista, 
            $Correo_Especialista, 
            $TipoVia_Especialista, 
            $NombreVia_Especialista, 
            $NumeroVia_Especialista,
            $CuentaBancaria_Especialista,
            $Cuota_Especialista,
            $Contrasena_Especialista, 
            $DNI_Especialista); // El último $DNI_Especialista es para la condición WHERE

        // Ejecutamos la consulta
        if (mysqli_stmt_execute($stmt)) {
            echo "Especialista actualizado correctamente.";
        } else {
            // Muestra el error de ejecución
            echo "Error al ejecutar la consulta: " . mysqli_stmt_error($stmt);
        }

        // Cerramos la declaración preparada
        mysqli_stmt_close($stmt);
    } else {
        // Si no se puede preparar la consulta
        echo "Error al preparar la consulta: " . mysqli_error($conn);
    }
}


if (isset($_REQUEST['DNI'])){ //que te envie aquí desde el boton de id, modificar 
    $DNI_Especialista=$_REQUEST['DNI'];

    $sql="SELECT * FROM ESPECIALISTAS WHERE DNI_Especialista= '$DNI_Especialista';";

    $resultado=mysqli_query($conn,$sql);

                //! Que estas 
    if(mysqli_num_rows($resultado)>0)
    {
        $row = mysqli_fetch_assoc($resultado);            
    ?>
<div id="contenedor_ME">
    <div id="central_ME">
        <div id="modiel">
            <div class="subtitulo_me">Modifica los datos del especialista</div>
            <form class="form_ME" action="" method="post">

            <label class="label_ME" for="ID_Especialista">ID:</label>
                <input type="text" id="ID_Especialista" readonly name="ID_Especialista" class="caja" value='<?php echo $row['ID_Especialista']?>'>

            <label class="label_ME" for="DNI_Especialista">DNI:</label>
                <input type="text" id="DNI_Especialista" name="DNI_Especialista" class="caja" required pattern="[0-9]{8}[A-Za-z]{1}" placeholder="DNI" value='<?php echo $row['DNI_Especialista']?>'>

            <label class="label_ME" for="Nombre_Especialista">Nombre:</label>
                <input type="text" id="Nombre_Especialista" name="Nombre_Especialista" class="caja" autofocus required pattern="[a-zA-Z\s]+" placeholder="Nombre" value='<?php echo $row['Nombre_Especialista']?>'>

            <label class="label_ME" for="Apellido_Especialista">Apellidos:</label>
                <input type="text" id="Apellido_Especialista" name="Apellido_Especialista" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Apellidos" value='<?php echo $row['Apellido_Especialista']?>'>

            <label class="label_ME" for="FechaNacimiento_Especialista">Fecha de Nacimiento:</label>
                <input type="date" name="FechaNacimiento_Especialista" id="FechaNacimiento_Especialista" class="caja" placeholder="Fecha Nacimiento (Año - Mes - Dia)" title="Fecha Nacimiento" value='<?php echo $row['FechaNacimiento_Especialista']?>'>

            <label class="label_ME" for="NumTelefono_Especialista">Teléfono: </label>
                <input type="tel" name="NumTelefono_Especialista"  id="NumTelefono_Especialista" class="caja" required placeholder="Telefono" value='<?php echo $row['NumTelefono_Especialista']?>'>

            <label class="label_ME" for="Correo_Especialista">e-Mail:</label>
                <input type="email" name="Correo_Especialista" id="Correo_Especialista" class="caja" required placeholder="email" value='<?php echo $row['Correo_Especialista']?>'>

            <label class="label_ME" for="TipoVia_Especialista">Tipo de la via:</label>
                <input type="text" class="caja" name="TipoVia_Especialista" id="TipoVia_Especialista" placeholder="Escribe el nombre de la via" value='<?php echo $row['TipoVia_Especialista']?>'>
            
            <label class="label_ME" for="NombreVia_Especialista">Nombre de la via:</label>
                <input type="text" class="caja" name="NombreVia_Especialista" id="NombreVia_Especialista" placeholder="Escribe el nombre de la via" value='<?php echo $row['NombreVia_Especialista']?>'>

            <label class="label_ME" for="NumeroVia_Especialista">Numero de la via:</label>
                <input type="text" class="caja" name="NumeroVia_Especialista" id="NumeroVia_Especialista" placeholder="Escribe el número de la via" value='<?php echo $row['NumeroVia_Especialista']?>'>
            
            <label class="label_ME" for="CuentaBancaria_Especialista">Cuenta Bancaria Especialista:</label>
                <input type="text" class="caja" name="CuentaBancaria_Especialista" id="CuentaBancaria_Especialista" placeholder="Escribe la cuenta bancaria" value='<?php echo $row['CuentaBancaria_Especialista']?>'>

            <label class="label_ME" for="Cuota_Especialista">Nombre de la via:</label>
                <input type="text" class="caja" name="Cuota_Especialista" id="Cuota_Especialista" placeholder="Escribe la nueva cuota" value='<?php echo $row['Cuota_Especialista']?>'>

            <label class="label_ME" for="Contrasena_Especialista">Contraseña:</label>
                <input type="password" name="Contrasena_Especialista" id="Contrasena_Especialista" class="caja"required placeholder="Contrasena" value='<?php echo $row['Contrasena_Especialista']?>'>
            
                <button type="submit" class="boton_ME" title="Modificar" name="Modificar">Guardar cambios</button>
            </form>
            <div class="botoooon_ME">
                <a href="GestionEspe.php">Volver</a>
            </div>
        </div>
    </div>    
</div>
<?php
}else{
    echo "Especialistas no encontrado: " . $sql . "<br>" .mysqli_error($conn);
}

    }

?>
</body>
</html>