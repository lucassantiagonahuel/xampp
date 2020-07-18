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
     
     $celda ['Id']=3;
     $celda ['Nombre']='Roberto';
     $personas [0]=$celda;
     $celda ['Id']=4;
     $celda ['Nombre']='Luisa';
     $personas [1]=$celda;
     $celda ['Id']=5;
     $celda ['Nombre']='Carlos';
     $personas [2]=$celda;
   ?>

 <?php  
  if (isset($_POST['nombre']))
     {
       $nombre=$_POST['nombre'];

     }  
      else
     {
       $nombre='';

     }

   require ("conexion.php");


   if ($nombre=='')
    {
      $resultado= $conn -> query ('select localidades.*,
        provincias.nombre_prov
        from localidades 
        INNER JOIN provincias on localidades.provincias_id=provincias.id');
    }  
     else
    {

       $resultado= $conn -> query ("select localidades.*,
        provincias.nombre_prov  
        from localidades 
        inner JOIN provincias on localidades.provincias_id = provincias.id 
        where localidades.nombre like'%$nombre%' or provincias.nombre_prov like '%$nombre%'");
    }  

    $loc = [];
     while ($registro = $resultado -> fetch_assoc())
      {
       array_push($loc,$registro);
      }
  ?>
<div class="container">
  <div> 
    <ul id="lista">
       <li class="menulista"> <a class="opciones" href="#">  opcion 1 </a></li> 
       <li class="menulista"> <a class="opciones" href="#">  opcion 2 </a></li>
       <li class="menulista"> <a class="opciones" href="#">  opcion 3 </a></li>
   </ul>
  </div> 
 <div class="form-group">
   <form action="index.php" method="POST"> 
     <div class="form-group">
       <input type="text" name="nombre" placeholder="buscar" > 
       <button class="btn btn-danger"> Buscar  </button>
     </div>    
   </form>
  </div>
    <div class="row">
  	  <div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">
  		       <p style="color:white";> Sector izquierdo </p> 
         <a href="Alta.php" class="btn btn-primary" >
         	Alta
         </a>
  		 <table class="table table-striped table-bordered table-hover fondo">
  	  	  <thead>
  	  	  	  <tr>
  	  	  		<th> Id </th>
  	  	  		<th> Nombre </th>
              <th> Provincia </th>
  	  	  		<th> Acciones </th>
  	  	  	  </tr>
  	  	  </thead>	
  	  	  <tbody>
  	  	  	   

  	  	  	  <?php 
  	  	  	    
                foreach ($loc as $localidad) 
                 {
                  echo'<tr>';
  	  	  	   	  echo  '<td>'.$localidad ['id'].'</td>';
                  echo  '<td>'.$localidad['nombre']. '</td>';
                  echo  '<td>'.$localidad['nombre_prov']. '</td>';
                  echo  '<td>';
                          
                  		echo    '<a href="modificar.php?id='.$localidad['id'].'" class="btn btn-info boton" >Modificar</a>'; 
                  		echo    '<a href="eliminar.php?id='.$localidad['id'].'" class="btn btn-warning boton" >Eliminar</a>';                

                  echo  '</td>';
  	  	  	      echo '</tr>';
                 }

  	  	  	   ?> 

  	  	  </tbody>

  	  	</table>                 
  	  </div>
	
  	  <div class="col-lg-4 col-md-4 col-sm-5 col-xs-6">
                 
         <p style="color:white";> Sector derecho </p>   

      </div>	
  		

  


  </div>	

</div>
</body>
</html>