
<?php 
 require ("conexion.php");   
 $accion= $_GET['accion'];
 if ($accion == 'Alta')
 	  
 	   {
 	   	 $nombre = $_POST['nombre'];
 	   	 $provincia = $_POST['provincia'];
 	 	   $resultado= mysqli_query ($conn,"insert into localidades (id,nombre,provincias_id) values (null,'$nombre','$provincia')");
 	   }


    if ($accion == 'modificar')
 	  
 	   {
 	   	 $id=$_GET['id'];
 	   	 $nombre = $_POST['nombre'];
 	 	   $resultado= mysqli_query ($conn,"update localidades set nombre='$nombre' where localidades.id ='$id'");
 	   }   

 	    if ($accion == 'eliminar')
 	  
 	   {
 	   	 $id=$_GET['id'];
 	   	 $nombre = $_POST['nombre'];
 	 	   $resultado= mysqli_query ($conn,"delete FROM localidades where localidades.id ='$id'");
 	   }   

    	
    	header("location:index.php");
 ?>