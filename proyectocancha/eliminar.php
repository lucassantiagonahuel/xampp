<!DOCTYPE html>
<html>
<head>
	<title>
		Eliminar Cliente
	</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
</head>
<body>
  <?php 
   $id_cli=$_GET['id_cli'];
    require ("conexion.php");
    $resultado= mysqli_query ($conn,"SELECT * FROM cliente WHERE cliente.id_cli=$id_cli"); 
    $cli=mysqli_fetch_array($resultado);
     ?> 
 <div id="contenedor">
  <div id="cabecera">
    <p style="color:red";>Eliminar Cliente </p>
  </div>
   <div id="ventana">
     
    <form method="POST" action="programa.php?accion=eliminar&id_cli=<?php echo $id_cli;?>">
     
      Nombre del cliente
      
       <div class="form-group">
        <input type="text" name="nom_cli" value="<?php echo $cli['nom_cli']?>" class="form-control"readonly>
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