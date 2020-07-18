<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
</head>
<body>
  <?php 
   $id= $_GET['id'];
    require ("conexion.php");
    $resultado= mysqli_query ($conn,"SELECT * FROM localidades WHERE localidades.id=$id"); 
    $loc=mysqli_fetch_array($resultado);
     ?> 
 <div id="contenedor">
  <div id="cabecera">
    <p style="color:red";>Eliminar Localidad </p>
  </div>
   <div id="ventana">
     
    <form method="POST" action="programa.php?accion=eliminar&id=<?php echo $id;?>">
     
      Nombre de la localidad
      
       <div class="form-group">
        <input type="text" name="nombre" value="<?php echo $loc['nombre']?>" class="form-control"readonly>
       </div>
      <div class="form-group"> 
       <button type="submit" class="form-control">     
         Eliminar
       </button>
      </div>
    </form>
   </div>
 </div>
</body>
</html>