<!DOCTYPE html>
<html>
<head>
	<title> Sistema de Gestion de Cancha </title>
 
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
  
  <style type="text/css">
  * { 
      padding:0px;
      margin:0px;
  }

  #header {
    margin:auto;
    width:500px;
    font-family:sans-serif;
  }

  ul,ol{
    list-style:none;
  }

  .nav li a {
    background-color:black;
    color:white;
    text-decoration:none;
    padding:10px 15px;
    display:block;

  }
  .nav li a:hover {
    background-color:#434343;
  }

  .nav > li {
    float:left;
  }

  .nav li ul {
    display:none;
    position:absolute;
    min-width:140px; 
  }

  .nav li:hover > ul {
    display:block;
  }

  </style>
 
</head>

<body>
<div id="cabecera">
    <p style="color:white";>SISTEMA DE GESTION DE CANCHA FUTBOL 5</p>
</div>

<div id="header">
  
  <ul class="nav">
    <li><a href="#"> CLIENTES </a>
      <ul>
        <li><a href="altacli.php">Registrar Cliente</a></li>
        <li><a href="gestcli.php">Gestion de Clientes</a></li>
      </ul>
      </li>
    
    <li><a href="#"> TURNOS </a>
       <ul>
        <!--<li><a href="gesttur.php">Turnos Reservados</a></li>  -->
        <li><a href="altatur.php">Registrar Turno</a></li>
        <li><a href="gesttur.php">Gestion de turnos</a></li>
      </ul>
      </li>

    <li><a href="#"> COBRANZAS </a>
       <ul>
          <li><a href="#">Nuevo Cobro</a></li>
        </ul>
        </li>    
    <li><a href="soporte.php"> SOPORTE </a></li> 
   


  </ul>
    

</div>
</body>
</html>