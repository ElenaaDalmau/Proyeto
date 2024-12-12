<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones de Gestión</title>
      <!-- Link hacia el archivo de estilos css -->
      <link rel="stylesheet" href="css/estilo.css">
      
    <!-- Fuentes y estilos -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>

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

*, *:before, *:after {
    -moz-box-sizing:border-box;
    -webkit-box-sizing:border-box;
    box-sizing:border-box;
    padding:0;
    margin:0;
}

body{
    background: #f0e9e6;
    line-height: 1.5;
    font-size: 16px;
} 










</style>

       
</head>
<body>
<?php
    session_start();
    include("./GestionBD/1-conexion.php");
?>

<!-- Header -->
<div id="header">
    <div class="logo">
        <img src="img/logo.png" alt="COACHING SL">
    </div>
    <nav>
        <ul>
            <li><a href="Inicio.php"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="ComoTrabajamos.php"><i class="fa fa-briefcase"></i> ¿Quiénes somos?</a></li>
            <li><a href="Contacto.php"><i class="fa fa-phone-square"></i> Puesta en contacto</a></li>
            <li><a href="ListadoEspecialistas.php"><i class="fa fa-address-book"></i> Especialistas</a></li>
            <li><a href="Calendario.html"><i class="fa fa-calendar"></i> Calendario</a></li>
        </ul>
    </nav>
</div>

<!--Cajas de opciones -->
<div id="management-section">
    <h2>Opciones de Gestión</h2>
    <div class="options">

        <!-- Card 1 -->
        <div class="card">
            <i class="fas fa-user-plus"></i>
            <h3>Alta de Especialistas</h3>
            <p>Registra y habilita especialistas para que puedan formar parte del sistema.</p>
            <a href="Registro_Espe.php" class="btn">Nuevo Registro</a>
        </div>

        <!-- Card 2 -->
        <div class="card">
            <i class="fas fa-user-tie"></i>
            <h3>Gestionar Especialistas</h3>
            <p>Administra y revisa los especialistas registrados en el sistema.</p>
            <a href="GestionEspe.php" class="btn">Ir a Especialistas</a>
        </div>

        <!-- Card 3 -->
        <div class="card">
            <i class="fas fa-address-book"></i>
            <h3>Gestionar Clientes</h3>
            <p>Administra y gestiona los datos de los clientes de manera efectiva.</p>
            <a href="GestionCli.php" class="btn">Ir a Clientes</a>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>

</body>
</html>
