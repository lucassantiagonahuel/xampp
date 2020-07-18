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
   
    require ("conexion.php");
    $resultado= mysqli_query ($conn,"SELECT * FROM provincias"); 
    
    $provincias = [];
     while ($registro = $resultado -> fetch_assoc())
      {
       array_push($provincias,$registro);
      }
     ?> 
 <div id="contenedor">
  <div id="cabecera">
    <p style="color:red";> Alta de localidades </p>
  </div>
   <div id="ventana">
    <form method="POST" action="programa.php?accion=Alta">
     
      Nombre de la localidad
      
       <div class="form-group">
        <input type="text" name="nombre" class="form-control" autofocus>
       </div>
       Nombre de la provincia
       <div class="form-group">
        <select class="form-control" name="provincia">
          <?php
            foreach ($provincias as $provincia ) 
             {
               echo"<option value=".$provincia['id'].">".$provincia['nombre_prov']."</option>";  
             }
            
         ?>    
       </select>
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