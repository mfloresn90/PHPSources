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
 $consulta="select * from oficinas left outer join repventas on oficinas.idOficina=repventas.IdOficina where oficinas.objetivo>200";
 $resultado=mysql_query($consulta, $link) or die("Error en: $consulta: " . mysql_error());
 
 if ($row = mysql_fetch_array($resultado)){ 
    echo "<table border = '1'> \n"; 
    echo "<tr><td>IdOficina</td><td>ciudad</td><td>region</td><td>numEmpleadorDir</td><td>objetivo</td><td>ventas</td><td>idEmpleados</td><td>nombre</td><td>edad</td><td>oficina_rep</td><td>titulo</td><td>contrato</td><td>director</td><td>cuota</td><td>ventas</td><td>idOficina</td></tr>\n"; 
    do { 
       echo "<tr><td>".$row["idOficina"]."</td><td>".$row["ciudad"]."</td><td>".$row["region"]."</td><td>".$row["numEmpleadorDir"]."</td><td>".$row["objetivo"]."</td><td>".$row["ventas"]."</td><td>".$row["idEmpleados"]."</td><td>".$row["nombre"]."</td><td>".$row["edad"]."</td><td>".$row["oficina_rep"]."</td><td>".$row["titulo"]."</td><td>".$row["contrato"]."</td><td>".$row["director"]."</td><td>".$row["cuota"]."</td><td>".$row["ventas"]."</td><td>".$row["idOficina"]."</td></tr> \n"; 
    } while ($row = mysql_fetch_array($resultado)); 
    echo "</table> \n"; 
 } else { 
 echo "No se encontro consulta"; 
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
