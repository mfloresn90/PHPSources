<?php
$host="localhost";
$usuario="root"; 
$pass=""; 
$nombre_BD="empleados";

$conexion=mysql_connect($host,$usuario,$pass);

if ($conexion)
{echo ("");
}
else
{
echo ("");
}

echo "<br>";

$conectarBD=mysql_select_db($nombre_BD,$conexion); 


if($conectarBD)
{
echo("");
}

?>