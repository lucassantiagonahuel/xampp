
<?php 
 require ("conexion.php");
 $accion= $_GET['accion'];
 if ($accion == 'altacli')
 	  
 	   {
 	   	 $nom_cli = $_POST['nom_cli'];
 	   	 $ape_cli = $_POST['ape_cli'];
 	   	 $tel_cli = $_POST['tel_cli'];
 	   	 $dom_cli = $_POST['dom_cli'];
 	 	   $resultado= mysqli_query ($conn,"insert into cliente values (null,'$nom_cli','$ape_cli','$tel_cli','$dom_cli')"
);
 	   }

if ($accion == 'altatur')
 	  
 	   {
 	   	 $fec_tur = $_POST['fec_tur'];
 	   	 $hor_tur = $_POST['hor_tur'];
 	   	 $precio = $_POST['precio_tur'];
 	   	 $id_cli = $_POST['id_cli'];
 	 	   $resultado= mysqli_query ($conn,"insert into turno (id,fecha_turno,hora_turno,precio,id_cli) values (null,'$fec_tur','$hor_tur','$precio','$id_cli')");
 	   }







    if ($accion == 'modificarcli')
 	  
 	   {
 	   	 $id_cli=$_GET['id_cli'];
 	   	 $nom_cli = $_POST['nom_cli'];
 	   	 $ape_cli = $_POST['ape_cli'];
 	   	 $tel_cli = $_POST['tel_cli'];
 	   	 $dom_cli = $_POST['dom_cli'];
 	 	   $resultado= mysqli_query ($conn,"update cliente set nom_cli='$nom_cli',ape_cli='$ape_cli',tel_cli='$tel_cli',dom_cli='$dom_cli' where cliente.id_cli='$id_cli'");
 	   }   

 	   if ($accion == 'modificartur')
 	  
 	   {
 	   	 $id_tur=$_GET['id_tur'];
 	   	 $fec_tur = $_POST['fecha_turno'];
 	   	 $hor_tur = $_POST['hora_turno'];
 	   	 $precio = $_POST['precio'];
 	   	 //$nom_cli = $_POST['nom_cli'];
 	   	 //$ape_cli = $_POST['ape_cli'];
 	 	   $resultado= mysqli_query ($conn,"update turno set id='$id_tur',fecha_turno='$fec_tur',hora_turno='$hor_tur', precio='$precio' where turno.id='$id_tur'");
 	   }   







 	    if ($accion == 'eliminar')
 	  
 	   {
 	   	 $id_cli=$_GET['id_cli'];
 	   	 $nom_cli = $_POST['nom_cli'];
 	 	   $resultado= mysqli_query ($conn,"delete FROM cliente where cliente.id_cli ='$id_cli'");
 	   }   

 	    if ($accion == 'eliminartur')
 	  
 	   {
 	   	 $id_tur=$_GET['id_tur'];
 	   	 $nom_cli = $_POST['nom_cli'];
 	 	   $resultado= mysqli_query ($conn,"delete FROM turno where turno.id ='$id_tur'");
 	   }   


    	
 	    




    	header("location:index.php");
 ?>