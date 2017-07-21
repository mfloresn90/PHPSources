<style type="text/css">
<!--
.Estilo1 {font-size: 36px}
.Estilo2 {font-size: 24px}
.Estilo3 {font-weight: bold}
.Estilo4 {font-size: 36px; font-weight: bold; }
-->
</style>
<body background="imagenes/EDIFICIOb.jpg">
<div align="center"><img src="imagenes/uaem.jpg" alt="u" width="1018" height="135" />
<img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/arco.jpg" alt="r" width="1018" height="113" /><img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/consulta.png" alt="aa" width="1018" height="75"></div>

<div align="center">
  <p>
    <span class="Estilo1">
    <?php
include "conecta.php"; // llamamos a la conexión al servidor y la base de datos
 $user="root";
 $host="localhost";
 $pass="admin";
 $dbname="empleados";
 $tabla="clientes";

 $link=mysql_connect($host, $user, $pass);
 $consulta="select curdate() fecha";
 $resultado=mysql_query($consulta, $link);

 if ($row = mysql_fetch_array($resultado)){ 
    echo "<table border = '1'> \n"; 
    echo "<tr><td>Fecha Actual</td></tr>\n"; 
    do { 
       echo "<tr><td>".$row["fecha"]."</td></tr> \n"; 
    } while ($row = mysql_fetch_array($resultado)); 
    echo "</table> \n"; 
 } else { 
 echo "No se ha encontrado ningun registro"; 
 } 
 ?>
  </span></p>
</div>
<p align="center" class="Estilo1">&nbsp;</p>
<form id="form1" name="form1" method="post" action="consultas.php">
  <p align="center">
    <label for="nocta"></label>
    <input name="Submit" type="submit" class="Estilo1" value="REGRESAR" />
  </p>
</form>
<p align="center">
  <map name="Map" id="Map">
    <area shape="rect" coords="39,10,321,57" href="inicio.php" /><area shape="rect" coords="371,13,642,57" href="principal.php" />
  <area shape="rect" coords="685,12,987,57" href="admin.php" />
  </map>
<img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/informes.png" alt="inf" width="1018" height="131" /></p>
</div>
</body>
