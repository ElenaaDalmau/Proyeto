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
        $DNI_Cliente = $_REQUEST['DNI_Cliente'];
        $NumTelefono_Cliente = $_REQUEST['NumTelefono_Cliente'];
        $Correo_Cliente = $_REQUEST['Correo_Cliente'];
        $Nombre_Cliente = $_REQUEST['Nombre_Cliente'];
        $Apellido_Cliente =$_REQUEST['Apellido_Cliente'];
        $Contrasena_Cliente =  $_REQUEST['Contrasena_Cliente'];
        $FechaNacimiento_Cliente =  $_REQUEST['FechaNacimiento_Cliente'];
        $NombreVia_Cliente =  $_REQUEST['NombreVia_Cliente'];
        $NumeroVia_Cliente =  $_REQUEST['NumeroVia_Cliente'];
        $TipoVia_Cliente =  $_REQUEST['TipoVia_Cliente'];

    $sql="UPDATE Cliente SET DNI_Cliente=' ".$DNI_Cliente."', Nombre_Cliente=' ".$Nombre_Cliente." ', Apellido_Cliente='".$Apellido_Cliente."', FechaNacimiento_Cliente='".$FechaNacimiento_Cliente."', NumTelefono_Cliente='".$NumTelefono_Cliente."'Correo_Cliente=' ".$Correo_Cliente." ', TipoVia_Cliente='".$TipoVia_Cliente."', NombreVia_Cliente='".$NombreVia_Cliente."', NumeroVia_Cliente='".$NumeroVia_Cliente."',Contrasena_Cliente='".$Contrasena_Cliente."',  WHERE ID_Cliente =".$ID_Cliente;
}

if (isset($_REQUEST['DNI'])){ //que te envie aquí desde el boton de id, modificar 
    $DNI_Cliente=$_REQUEST['DNI'];

    $sql="SELECT * FROM Clientes WHERE DNI_Cliente= '$DNI_Cliente';";
    $resultado=mysqli_query($conn,$sql);

    if(mysqli_num_rows($resultado)>0){


?>
<div id="contenedor">
    <div id="central">
        <div id="login">
            <div class="titulo">
                Bienvenido
            </div>
            <form id="ModificarArticulos" action="" method="post">
            <label for="DNI_Cliente">DNI:</label>
            <input type="text" name="DNI_Cliente" required pattern="[0-9]{8}[A-Za-z]{1}" placeholder="DNI" required value='<?php echo $row['DNI_Cliente']?>'>

            <input type="tel" name="NumTelefono_Cliente" required placeholder="Teléfono">
            <input type="email" name="Correo_Cliente" required placeholder="Correo">
            <input type="text" name="Nombre_Cliente" required pattern="[a-zA-Z\s]+" placeholder="Nombre">
            <input type="text" name="Apellido_Cliente" required pattern="[a-zA-Z\s]+" placeholder="Apellidos">
            <input type="password" name="Contrasena_Cliente" required placeholder="Contraseña">
            <input type="date" name="FechaNacimiento_Cliente" placeholder="Fecha de Nacimiento">
            <input type="text" name="NombreVia_Cliente" placeholder="Nombre de la vía">
            <input type="text" name="NumeroVia_Cliente" placeholder="Número de la vía">
            <input type="text" name="TipoVia_Cliente" placeholder="Tipo de vía">
            <input type="text" name="Tipo" placeholder="Tipo">
            

                <label for="id_Articulo">Id_Articulo:</label>
                <input type="text" id="id_Articulo" name="id_Articulo" placeholder="id_Articulo"  required value='<?php echo $row['id_Articulo']?>'>
                <label for="Nombre">Nombre:</label>
                <input type="text" id="Nombre" name="Nombre" class="caja" autofocus required placeholder="Nombre" value='<?php echo $row['Nombre']?>'>
                <label for="Descripcion">Descripcion:</label>
                <input type="text" name="Descripcion" id="Descripcion" required placeholder="Descripcion" value='<?php echo $row['Descripcion']?>'>
                <label for="Foto">Foto:</label>
                <input type="image" name="Foto" id="Foto" placeholder="Foto" value='<?php echo $row['Foto']?>'>
                <label for="Precio">Precio: </label>
                <input type="number" name="Precio"  id="Precio" placeholder="Precio" required value='<?php echo $row['Precio']?>'>

                <button type="submit" title="Modificar" name="Modificar">Modificar</button>
            </form>
            <div class="pie-form">
                <a href="catalogo.php">Volver</a>
            </div>
        </div>
    </div>    
</div>
<?php
}else{
    echo "Artículo no encontrado: " . $sql . "<br>" .mysqli_error($conn);
}

    }

?>
</body>
</html>