<style type="text/css">
<!--
.Estilo1 {font-size: 36px}
-->
</style>
<body background="imagenes/EDIFICIOb.jpg">
<div align="center">
  <p><img src="imagenes/uaem.jpg" alt="u" width="1018" height="135" />
    <img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/arco.jpg" alt="r" width="1018" height="113" /><img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/pedido.png" width="1018" height="80"></p>
</div>

<div align="center">
  <p><span class="Estilo1">
    <?php
include "conecta.php"; // llamamos a la conexión al servidor y la base de datos

$consulta = "select * from pedidos"; //inserta consulta
$resultado = mysql_query($consulta);  //ejecuta consulta
$num_resultados = mysql_num_rows($resultado);  // cuenta cuantos fueron
	 
echo "	 <table width='933' height='105' border='1'> ";
echo "    <tr> ";
echo "      <th scope='col'>NUMERO DE PEDIDO</th>    ";
echo "      <th scope='col'>FECHA DE PEDIDO</th>    ";
echo "      <th scope='col'>NUMERO DE FABRICANTE</th>    ";
echo "      <th scope='col'>CANTIDAD</th>    ";
echo "      <th scope='col'>IMPORTE</th>    ";
echo "      <th scope='col'>NUMERO DE CLIENTE</th>    ";
echo "      <th scope='col'>FECHA DE EMPLEADO</th>    ";
echo "      <th scope='col'>NUMERO DE PRODUCTO</th>    ";
echo "    </tr> ";
	 
	 while ($row = mysql_fetch_array($resultado)){
   
	  echo "<tr> <td> "; 
	  echo $row["idPedido"];  
	  echo "</td> <td> ";
	  echo $row["fecha_pedido"];  
	  echo "</td> <td> ";
	  echo $row["idFabricante"];  
	  echo "</td> <td> ";
	  echo $row["cantidad"];  
	  echo "</td> <td> ";
	  echo $row["importe"];  
	  echo "</td> <td> ";
	  echo $row["idCliente"];
	  echo "</td> <td> ";
	  echo $row["idEmpleados"];
	  echo "</td> <td> ";
	  echo $row["idProducto"];  
	  echo "</td> ";
	 
  }
  
  echo "    </table>";
   
  ?>
  
  </span></p>
</div>
<form id="form1" name="form1" method="post" action="menu_pe.php">
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
