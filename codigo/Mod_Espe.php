<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Catálgo </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/login.css">
        <!-- Link hacia el archivo de estilos de bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
        <script src="script.js"></script>

        <style>
        /* Reset General */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #e6dfd8, #c4b8ae);
            color: #4a4036;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styling */
        #header {
            background: linear-gradient(to right, #a89584, #8c7265);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        #header .logo img {
            max-width: 120px;
        }

        #header nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        #header nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        #header nav ul li a:hover {
            background: #e6dfd8;
            color: #8c7265;
            transform: scale(1.1);
        }

        .lenguage-selector select {
            padding: 8px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            background: #e6dfd8;
            color: #8c7265;
            font-weight: bold;
        }

        /* Main Title */
        .titulo2 {
            text-align: center;
            font-size: 28px;
            color: #8c7265;
            margin: 30px 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Main Container */
        #contenedor {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            padding: 30px;
        }

        #central {
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
            transition: transform 0.3s ease;
        }

        #central:hover {
            transform: translateY(-5px);
        }

        #login {
            text-align: center;
        }

        #login .titulo {
            font-size: 22px;
            margin-bottom: 20px;
            color: #4a4036;
            font-weight: 600;
        }

        form {
            display: grid;
            gap: 15px;
        }

        form label {
            font-size: 14px;
            color: #4a4036;
            font-weight: bold;
        }

        form .caja {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background: #f8f4f2;
            color: #4a4036;
            transition: border 0.3s, box-shadow 0.3s;
        }

        form .caja:focus {
            border-color: #8c7265;
            box-shadow: 0 0 5px rgba(140, 114, 101, 0.4);
            outline: none;
        }

        form button {
            padding: 12px;
            background: linear-gradient(135deg, #8c7265, #6d5a50);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        form button:hover {
            background: linear-gradient(135deg, #6d5a50, #574740);
            transform: scale(1.05);
        }

        .pie-form a {
            text-decoration: none;
            color: #8c7265;
            font-weight: bold;
            transition: color 0.3s ease;
            text-align: center;
            display: block;
            margin-top: 10px;
        }

        .pie-form a:hover {
            color: #6d5a50;
        }

        /* Footer */
        footer {
            text-align: center;
            background: #8c7265;
            color: white;
            padding: 15px;
            font-size: 14px;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                grid-template-columns: 1fr;
            }

            #header {
                flex-direction: column;
                gap: 15px;
            }

            #header nav ul {
                flex-direction: column;
                gap: 10px;
            }
        }

</style>

    </head>
    
    <body class="fondo">
        <!-- Link hacia las librerias jsp de bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
           
        <div class="titulo2">Modificar productos </div>
        <div id="contenedor2">



<!-- En este código queremos modificar la tabla de articulos, pero como verás no se muestra nada. -->

<?php
session_start();
include("./GestionBD/1-conexion.php");

if(isset($_REQUEST['Modificar'])){
        $DNI_Especialista=$_REQUEST['DNI_Especialista'];
        $Nombre_Especialista=$_REQUEST['Nombre_Especialista'];
        $Apellido_Especialista=$_REQUEST['Apellido_Especialista'];
        $FechaNacimiento_Especialista=$_REQUEST['FechaNacimiento_Especialista'];
        $NumTelefono_Especialista=$_REQUEST['NumTelefono_Especialista'];
        $Correo_Especialista=$_REQUEST['Correo_Especialista'];
        $TipoVia_Especialista=$_REQUEST['TipoVia_Especialista'];
        $NombreVia_Especialista=$_REQUEST['NombreVia_Especialista'];
        $NumeroVia_Especialista=$_REQUEST['NumeroVia_Especialista'];
        $CuentaBancaria_Especialista=$_REQUEST['CuentaBancaria_Especialista'];
        $Cuota_Especialista=$_REQUEST['Cuota_Especialista'];
        $Contrasena_Especialista=$_REQUEST['Contrasena_Especialista'];
    
        $sql="UPDATE Especialistas SET DNI_Especialista=' ".$DNI_Especialista."', Nombre_Especialista=' ".$Nombre_Especialista." ', Apellido_Especialista='".$Apellido_Especialista."',
        FechaNacimiento_Especialista='".$FechaNacimiento_Especialista."', NumTelefono_Especialista='".$NumTelefono_Especialista."'Correo_Especialista=' ".$Correo_Especialista."
        ', TipoVia_Especialista='".$TipoVia_Especialista."', NombreVia_Especialista='".$NombreVia_Especialista."', NumeroVia_Especialista='".$NumeroVia_Especialista."'
        , CuentaBancaria_Especialista=' ".$CuentaBancaria_Especialista." ', Cuota_Especialista=' ".$Cuota_Especialista." ',Contrasena_Especialista='".$Contrasena_Especialista."',  WHERE DNI_Especialista =".$DNI_Especialista;
    }

if (isset($_REQUEST['DNI'])){ //que te envie aquí desde el boton de id, modificar 
    $DNI_Especialista=$_REQUEST['DNI'];

    $sql="SELECT * FROM Especialistas WHERE DNI_Especialista= '$DNI_Especialista';";
    $resultado=mysqli_query($conn,$sql);

    if(mysqli_num_rows($resultado)>0){


?>
<div id="contenedor_ME">
    <div id="central_ME">
        <div id="modiel">
            <div class="subtitulo_me">Bienvenido</div>
            <form class="form_ME" id="ModificarArticulos" action="" method="post">
                <label class="label_ME" for="DNI_Especialista">DNI:</label>
                    <input type="text" id="DNI_Especialista" name="DNI_Especialista" class="caja" value = '<?php echo $row['DNI_Especialista'] ?>'>
                
                <label class="label_ME" for="Nombre_Especialista">Nombre:</label>
                    <input type="text" id="Nombre_Especialista" name="Nombre_Especialista" class="caja" value = '<?php echo $row['Nombre_Especialista'] ?>'>
                
                <label class="label_ME" for="Apellido_Especialista">Apellido:</label>
                    <input type="text" id="Apellido_Especialista" name="Apellido_Especialista" class="caja" value = '<?php echo $row['Apellido_Especialista'] ?>'>
                
                <label class="label_ME" for="FechaNacimiento_Especialista">Fecha de nacimiento:</label>
                    <input type="image" name="FechaNacimiento_Especialista" id="FechaNacimiento_Especialista" class="caja" value = '<?php echo $row['FechaNacimiento_Especialista'] ?>'>
                
                <label class="label_ME" for="NumTelefono_Especialista">Numero de telefono: </label>
                    <input type="number" name="NumTelefono_Especialista"  id="NumTelefono_Especialista" class="caja" value = '<?php echo $row['NumTelefono_Especialista'] ?>'>

                <label class="label_ME" for="Correo_Especialista">Correo electronico: </label>
                    <input type="number" name="Correo_Especialista"  id="Correo_Especialista" class="caja" value = '<?php echo $row['Correo_Especialista'] ?>'>

                <label class="label_ME" for="TipoVia_Especialista">Tipo de via: </label>
                    <input type="number" name="TipoVia_Especialista"  id="TipoVia_Especialista" class="caja" value = '<?php echo $row['TipoVia_Especialista'] ?>'>

                <label class="label_ME" for="NombreVia_Especialista">Nombre de la via: </label>
                    <input type="number" name="NombreVia_Especialista"  id="NombreVia_Especialista" class="caja" value = '<?php echo $row['NombreVia_Especialista'] ?>'>

                <label class="label_ME" for="NumeroVia_Especialista">Numero de la via: </label>
                    <input type="NumeroVia_Especialista" name="NumeroVia_Especialista"  id="NumeroVia_Especialista" class="caja" value = '<?php echo $row['NumeroVia_Especialista'] ?>'>

                <label class="label_ME" for="CuentaBancaria_Especialista">Cuenta bancaria: </label>
                    <input type="number" name="CuentaBancaria_Especialista"  id="CuentaBancaria_Especialista" class="caja" value = '<?php echo $row['CuentaBancaria_Especialista'] ?>'>

                <label class="label_ME" for="Cuota_Especialista">Cuota del especialista: </label>
                    <input type="number" name="Cuota_Especialista"  id="Cuota_Especialista" class="caja" value = '<?php echo $row['Cuota_Especialista'] ?>'>

                <label class="label_ME" for="Contrasena_Especialista">Contraseña: </label>
                    <input type="number" name="Contrasena_Especialista"  id="Contrasena_Especialista" class="caja" value = '<?php echo $row['Contrasena_Especialista'] ?>'>
            
                <button type="submit" class="boton_ME" title="Modificar" name="Modificar">Modificar</button>
            </form>
            <div class="botoooon_ME">
                <a href="GestionEspe.php">Volver</a>
            </div>
        </div>
    </div>    
</div>
<?php
}else{
    echo "Especialista no encontrado: " . $sql . "<br>" .mysqli_error($conn);
}

    }

?>
</body>
</html>