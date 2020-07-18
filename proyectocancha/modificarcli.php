<!DOCTYPE html>
<html>
<head>
	<title>
		Modificar Clientes
	</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
</head>
<body>
  <?php 
   $id_cli= $_GET['id_cli'];
    require ("conexion.php");
    $resultado= mysqli_query ($conn,"SELECT * FROM cliente WHERE cliente.id_cli=$id_cli"); 
    $cli=mysqli_fetch_array($resultado);
     ?> 
 <div id="contenedor">
  <div id="cabecera">
    <p style="color:white";>Modificar Cliente </p>
  </div>
   <div id="ventana">
     
    <form method="POST" action="programa.php?accion=modificarcli&id_cli=<?php echo "$id_cli";?>">
     
       Nombre del cliente
      
       <div class="form-group">
        <input type="text" name="nom_cli" value="<?php echo $cli['nom_cli']?>" class="form-control" autofocus >
       </div>
       Apellido del cliente
       <div class="form-group">
        <input type="text" name="ape_cli" value="<?php echo $cli['ape_cli']?>" class="form-control" autofocus >
       </div>
       Telefono del cliente
       <div class="form-group">
        <input type="text" name="tel_cli" value="<?php echo $cli['tel_cli']?>" class="form-control" autofocus >
       </div>
       Domicilio del cliente
       <div class="form-group">
        <input type="text" name="dom_cli" value="<?php echo $cli['dom_cli']?>" class="form-control" autofocus >
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