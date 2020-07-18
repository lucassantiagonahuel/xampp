<!DOCTYPE html>
<html>
<head>
	<title>
		Modificar Turno
	</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
</head>
<body>
  <?php 
   $id_tur= $_GET['id_tur'];
    require ("conexion.php");
    $resultado= mysqli_query ($conn,"select turno.fecha_turno,turno.hora_turno,turno.precio,cliente.nom_cli,cliente.ape_cli
from turno 
inner join cliente
on turno.id_cli = cliente.id_cli
where turno.id=$id_tur"); 
    $tur=mysqli_fetch_array($resultado);
     ?> 
 <div id="contenedor">
  <div id="cabecera">
    <p style="color:white";>Modificar Turno </p>
  </div>
   <div id="ventana">
     
    <form method="POST" action="programa.php?accion=modificartur&id_tur=<?php echo "$id_tur";?>">
     
       Fecha
      
       <div class="form-group">
        <input type="date" name="fecha_turno" value="<?php echo $tur['fecha_turno']?>" class="form-control" autofocus>
       </div>
       Hora
       <div class="form-group">
        <input type="time" name="hora_turno" value="<?php echo $tur['hora_turno']?>" class="form-control" autofocus>
       </div>
       Precio
        <div class="form-group">
        <input type="text" name="precio" value="<?php echo $tur['precio']?>" class="form-control" autofocus>
       </div>
       Cliente
       <div class="form-group">
        <input type="text" name="nom_cli" value="<?php echo $tur['nom_cli'],'',$tur['ape_cli'] ?>" class="form-control" readonly>
       </div>
       

      <div class="form-group"> 
       <button type="submit" class="form-control">     
         Guardar
       </button>
      </div>
    </form>
   </div>
 </div>
</body>
</html>