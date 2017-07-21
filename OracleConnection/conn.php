<?php

$conn = oci_connect("yoshi", "yoshi", "localhost/");

if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
   echo "Conexion con exito a Oracle!";
}

/*
$stid = oci_parse($conn, 'INSERT INTO pieza (nombre) VALUES(:name)');

$name = 'bisquet  de trigo';

oci_bind_by_name($stid, ':name', $name);

$r = oci_execute($stid);  // ejecuta y consigna

if ($r) {
    echo "<br> Una fila insertada";
}
*/

// Preparar la sentencia
$stid = oci_parse($conn, 'SELECT * FROM pieza');
if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Realizar la lógica de la consulta
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Obtener los resultados de la consulta
echo "<table border='1'>\n";
while ($fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($fila as $elemento) {
        echo "    <td>" . ($elemento !== null ? htmlentities($elemento, ENT_QUOTES) : "") . "</td><br>";
    }
    echo "</tr><br>";
}
echo "</table><br>";



oci_free_statement($stid);
oci_close($conn);
?>