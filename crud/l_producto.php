<style type="text/css">
<!--
.Estilo1 {font-size: 36px}
-->
</style>
<body background="imagenes/EDIFICIOb.jpg">
<div align="center">
  <p><img src="imagenes/uaem.jpg" alt="u" width="1018" height="135" />
    <img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/arco.jpg" alt="r" width="1018" height="113" /><img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/producto.png" width="1018" height="80"></p>
</div>

<div align="center">
  <p><span class="Estilo1">
    <?php
include "conecta.php"; // llamamos a la conexi�n al servidor y la base de datos

$consulta = "select * from productos"; //inserta consulta
$resultado = mysql_query($consulta);  //ejecuta consulta
$num_resultados = mysql_num_rows($resultado);  // cuenta cuantos fueron
	 
echo "	 <table width='933' height='105' border='1'> ";
echo "    <tr> ";
echo "      <th scope='col'>NUMERO DE PRODUCTO</th>    ";
echo "      <th scope='col'>NUMERO DE FABRICANTE</th>    ";
echo "      <th scope='col'>DESCRIPCION</th>    ";
echo "      <th scope='col'>PRECIO</th>    ";
echo "      <th scope='col'>EXISTENCIA</th>    ";
echo "    </tr> ";
	 
	 while ($row = mysql_fetch_array($resultado)){
   
	  echo "<tr> <td> "; 
	  echo $row["idProducto"];  
	  echo "</td> <td> ";
	  echo $row["idFabricante"];  
	  echo "</td> <td> ";
	  echo $row["descripcion"];  
	  echo "</td> <td> ";
	  echo $row["precio"];  
	  echo "</td> <td> ";
	  echo $row["existencia"];  
	  echo "</td> ";
	 
  }
  
  echo "    </table>";
   
  ?>
  
  </span></p>
</div>
<form id="form1" name="form1" method="post" action="menu_pr.php">
  <p align="center">
    <label for="nocta"></label>
    <input name="regresar" type="submit" class="Estilo1" value="REGRESAR" id="regresar">
  </p>
</form>
<p align="center">
  <map name="Map" id="Map">
</map><img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/informes.png" alt="inf" width="1018" height="131" /></p>
</div>
</body>
