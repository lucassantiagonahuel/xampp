<?php
require ("conexion.php");

$resultado = $conn->query("SELECT * FROM pedidos ORDER BY fecha");


$barbijos = [];

if($resultado!= false)
if($resultado->num_rows > 0)
{
    $row = $resultado->fetch_assoc();
   while($row)
    {
        $barbijos[] = $row;

        $row = $resultado->fetch_assoc();
    }
}

mysqli_close($conn);

echo json_encode($barbijos);

?>
