<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones de Gestión</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/estilo.css"> <!-- Archivo CSS externo -->

<style>


/*CSS DE FUNCIONES DE ESPECIALISTAS*/
/* Estilos Generales */
body {
    font-family: 'Nunito', sans-serif;
    margin: 0;
    padding: 0;
}

#FuncionesOpciones {
    padding: 152px 20px;
    text-align: center;
    background: linear-gradient(to bottom, #5f534e, #caa061);*/ /* Fondo en degradado */
    height: 100%;
}

#FuncionesOpciones h2 {
    color: #fff;
    margin-bottom: 40px;
    font-size: 2rem;
}

.opciones {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.opcion-caja {
    background: white;
    border-radius: 15px;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    padding: 20px;
    width: 300px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.opcion-caja:hover {
    transform: translateY(-10px);
    box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.3);
}

.opcion-caja i {
    color: #d39b48;
    margin-bottom: 20px;
    font-size: 3rem;
}

.opcion-caja h3 {
    font-size: 1.2rem;
    color: #333;
    margin-bottom: 10px;
}

.opcion-caja p {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 15px;
}

.opcion-caja a {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 20px;
    background: #8f9bb3;
    color: white;
    font-size: 0.9rem;
    text-decoration: none;
    font-weight: bold;
}

.opcion-caja a:hover {
    background: #d39b48;
    transform: scale(1.05);
}

footer{
    background-color: #af988e;
    line-height: 3;
    text-align:center;
    width: 100%;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
    
  }

footer p {
    margin: 10px 0;
}

/* Diseño Responsivo */
@media (max-width: 768px) {
    .opciones {
        flex-direction: column;
    }

    .opcion-caja {
        width: 90%;
        margin-bottom: 20px;
    }
}


</style>



</head>
<body id="gestion-especialistas">

<?php
    session_start();
    include("./GestionBD/1-conexion.php");

    // Construir la consulta SQL
    $sql = "SELECT * FROM especialistas WHERE DNI_Especialista = '" . $_SESSION['DNI_Especialista'] . "';";

    // Ejecutar la consulta
    $result = mysqli_query($conn, $sql);

    // Validar el resultado de la consulta
    if (!$result) {
        die("Error en la consulta SQL: " . mysqli_error($conn));
    }
 
    // Obtener los datos
    $row = mysqli_fetch_assoc($result);

    // Verificar si se encontraron resultados
    if (!$row) {
        die("Error: No se encontraron datos para el DNI proporcionado.");
    }
?>

<!-- CABECERA -->
<div id="header">
    <div class="logo">
        <img src="img/logo.png" alt="COACHING SL">
    </div>
    <nav>
        <ul>
            <li><a href="Inicio.php"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="ComoTrabajamos.php"><i class="fa fa-briefcase"></i> ¿Quiénes somos?</a></li>
            <li><a href="Contacto.php"><i class="fa fa-phone-square"></i> Contacto</a></li>
            <li><a href="ListadoEspecialistas.php"><i class="fa fa-address-book"></i> Especialistas</a></li>
            <li><a href="Calendario.html"><i class="fa fa-calendar"></i> Calendario</a></li>
        </ul>
    </nav>
</div>

<!-- FUNCIONES OPCIONES -->
<div id="FuncionesOpciones">
    <h2><?php echo "¡Bienvenido " . htmlspecialchars($row['Nombre_Especialista']) . " " . htmlspecialchars($row['Apellido_Especialista']) . "!"; ?></h2>
    <div class="opciones">
        <!-- Opción 1 -->
        <div class="opcion-caja">
            <i class="fa fa-calendar-alt"></i>
            <h3>¿Deseas ver las citas que tienes asignadas?</h3>
            <p>Si necesitas consultar las citas que tienes pendiente, puedes verlas aquí.</p>
            <a href="MisCitasEspe.php">Haz clic aquí</a>
        </div>
        <!-- Opción 2 -->
        <div class="opcion-caja">
            <i class="fa fa-user-shield"></i>
            <h3>¿Necesitas consultar con un administrador?</h3>
            <p>Cualquier duda que tengas sobre tu cuenta o funcionalidades, consúltalo aquí.</p>
            <a href="ConsultaESPE.php">Haz clic aquí</a>
        </div>
    </div>
</div>

<!-- PIE DE PÁGINA -->
<footer>
    Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>

</body>
</html>
