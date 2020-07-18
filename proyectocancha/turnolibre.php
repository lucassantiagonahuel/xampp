<!DOCTYPE html>
<html>
<head>
	<title>
		Turnos
	</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
</head>
<body>
 

 <?php 
    require ("conexion.php");
    $resultado= $conn -> query ('select *
from turno
where id_cli="0"

' );
    $tur = [];
     while ($registro = $resultado -> fetch_assoc())
      {
       array_push($tur,$registro);
      }

  ?>
<div id="cabecera">
    <p style="color:white";> Gestion de turnos </p>
</div>

<div class="container">
  <div class="row">
  	  <div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">
  		      
         <a href="altatur.php" class="btn btn-primary btn-lg active " >
         	Alta
         </a>
  		 <table class="table table-striped table-bordered table-hover fondo">
  	  	  <thead>
  	  	  	  <tr> 
  	  	  		<th bgcolor="#FF3F2C"> Id </th>
  	  	  		<th bgcolor="#FF3F2C"> Fecha </th>
              <th bgcolor="#FF3F2C"> Hora </th>
              <th bgcolor="#FF3F2C"> Precio </th>
              
  	  	  	  </tr>
  	  	  </thead>	
  	  	  <tbody>
  	  	  	   

  	  	  	  <?php 

                foreach ($tur as $turno) 
                {
                
           
                  echo '<tr>';
                  
                  echo  '<td><font color="white">'.$turno['id'].'</font> </td>';
  	  	  	   	  echo  '<td><font color="white">'.$turno['fecha_turno'].'</font> </td>';
                  echo  '<td><font color="white">'.$turno['hora_turno'].'</font> </td>';
                  echo  '<td><font color="white">'.$turno['precio'].'</font> </td>';
                  
                  
                  echo  '<td>';
                          echo  '<a href="modificartur.php?id_tur='.$turno['id'].'" class="btn btn-info">Modificar</a>'; 
                          echo  '<a href="eliminartur.php?id_tur='.$turno['id'].'" class="btn btn btn-warning">Eliminar</a>';                
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