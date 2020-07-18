<!DOCTYPE html>
<html>
<head>
	
  <title> Alta de Clientes </title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
</head>
<body>
 <div id="contenedor">
  <div id="cabecera">
    <p style="color:white";> Alta de clientes </p>
  </div>
   <div id="ventana">
    <form method="POST" action="programa.php?accion=altacli">
     
            <font color="black">Nombre Del Cliente  </font>
      
       <div class="form-group">
        <input type="text" name="nom_cli" class="form-control" autofocus>
       </div>
            <font color="black"> Apellido Del Cliente </font>
       <div class="form-group">
        <input type="text" name="ape_cli" class="form-control" autofocus>
       </div>
            <font color="black"> Telefono Del Cliente  </font>
       <div class="form-group">
        <input type="text" name="tel_cli" class="form-control" autofocus>
       </div>
            <font color="black">Domicilio Del Cliente  </font>
       <div class="form-group">
        <input type="text" name="dom_cli" class="form-control" autofocus>
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