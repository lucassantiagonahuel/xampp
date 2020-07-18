<!DOCTYPE html>
<html>
<head>
	<title>
		Clientes
	</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
</head>
<body>
 

 <?php 
    require ("conexion.php");
    $resultado= $conn -> query ('SELECT * FROM cliente order by cliente.nom_cli');
    $cli = [];
     while ($registro = $resultado -> fetch_assoc())
      {
       array_push($cli,$registro);
      }

  ?>
<div id="cabecera">
    <p style="color:white";> Gestion de clientes </p>
</div>

<div class="container">
  <div class="row">
  	  <div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">
  		      
         <a href="altacli.php" class="btn btn-primary btn-lg active " >
         	Alta
         </a>
  		 <table class="table table-striped table-bordered table-hover fondo">
  	  	  <thead>
  	  	  	  <tr> 
  	  	  		<th bgcolor="#FF3F2C"> Id </th>
  	  	  		<th bgcolor="#FF3F2C"> Nombre </th>
              <th bgcolor="#FF3F2C"> Apellido </th>
              <th bgcolor="#FF3F2C"> Telefono </th>
              <th bgcolor="#FF3F2C"> Domicilio </th>
              <th bgcolor="#FF3F2C"> Acciones</th>
  	  	  	  </tr>
  	  	  </thead>	
  	  	  <tbody>
  	  	  	   

  	  	  	  <?php 
  	  	  	    
                foreach ($cli as $cliente) 
                 {
                  echo'<tr>';
  	  	  	   	  echo  '<td><font color="white">'.$cliente['id_cli'].'</font> </td>';
                  echo  '<td><font color="white">'.$cliente['nom_cli'].'</font> </td>';
                  echo  '<td><font color="white">'.$cliente['ape_cli'].'</font> </td>';
                  echo  '<td><font color="white">'.$cliente['tel_cli'].'</font> </td>';
                  echo  '<td><font color="white">'.$cliente['dom_cli'].'</font> </td>';
                  echo  '<td>';
                          
                  echo  '<a href="modificarcli.php?id_cli='.$cliente['id_cli'].'" class="btn btn-info">Modificar</a>'; 
                  echo  '<a href="eliminarcli.php?id_cli='.$cliente['id_cli'].'" class="btn btn btn-warning">Eliminar</a>';                

                  echo  '</td>';
  	  	  	      echo '</tr>';
                 }

  	  	  	   ?> 

  	  	  </tbody>

  	  	</table>                 
  	  </div>

	
  	  <div class="col-lg-4 col-md-4 col-sm-5 col-xs-6">
               
            

      </div>	
  		

  



  </div>	

</div>
</body>
</html>