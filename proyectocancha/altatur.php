<!DOCTYPE html>
<html>
<head>
	
  <title> Alta de Turno </title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
</head>
<body>



<?php 
    require ("conexion.php");
    $resultado= $conn -> query ('select * from cliente');
    $cliente = [];
     while ($registro = $resultado -> fetch_assoc())
      {
       array_push($cliente,$registro);
      }

  ?>


 <div id="contenedor">
  <div id="cabecera">
    <p style="color:white";> Alta de Turno </p>
  </div>
   <div id="ventana">
    <form method="POST" action="programa.php?accion=altatur">
     
            <font color="black">Fecha</font>
      
       <div class="form-group">
        <input type="date" name="fec_tur" class="form-control" autofocus>
       </div>
            <font color="black"> Hora </font>
       <div class="form-group">
        <input type="time" name="hor_tur" class="form-control" autofocus>
       </div>
            <font color="black"> Precio </font>
       <div class="form-group">
        <input type="text" name="precio_tur" class="form-control" autofocus>
       </div>

       <font color="black"> Cliente  </font>
       <div class="form-group">
        <select class="form-control" name="id_cli">
            <?php 
              foreach ($cliente as $cli)  
              {
                echo "<option value=".$cli['id_cli'].">".$cli['nom_cli'].' '.$cli['ape_cli']."</option>";         
              }

             ?>
          </select>
       </div>
       <div class="form-group"> 
         <button type="submit" class="form-control  btn-lg btn-block">     
         Guardar
       </button>
      </div>
    </form>
   </div>
 </div>
</body>
</html>