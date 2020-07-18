<?php
require ("conexion.php");

$resultado = $conn->query("SELECT * FROM clientes ORDER BY id_cli");

$clientes= array();
if ($resultado->num_rows > 0 )
{
	$row = $resultado -> fetch_assoc();
    while($row)
     {
        $clientes[] = $row;
        $row = $resultado->fetch_assoc();
     }
}
mysqli_close($conn);
echo json_encode($clientes);
?>