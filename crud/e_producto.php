<style type="text/css">
<!--
.Estilo1 {font-size: 36px}
-->
</style>
<body background="imagenes/EDIFICIOb.jpg">
<div align="center"><img src="imagenes/uaem.jpg" alt="u" width="1018" height="135" />
  <img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/arco.jpg" alt="r" width="1018" height="113" /><img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/producto.png" alt="baa" width="1018" height="75"></div>

<div align="center">
  <p>
    <span class="Estilo1">
	
	<?php
include "conecta.php"; // llamamos a la conexión al servidor y la base de datos

$idProducto=$_POST['idProducto'];

$baja="delete from productos where idProducto = '".$idProducto."'";

$resul=mysql_query($baja);

if ($resul=true)
	echo "Se borraron los datos";

else
	echo "No se pudieron borrar los dato";

?>
</span></p>
</div>
<p align="center" class="Estilo1">&nbsp;</p>
<form id="form1" name="form1" method="post" action="eliminar_pr.php">
  <p align="center">
    <label for="nocta"></label>
    <input name="Submit" type="submit" class="Estilo1" value="REGRESAR" />
  </p>
</form>
<p align="center" class="Estilo1">
 
<img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/informes.png" alt="inf" width="1018" height="131" /></p>
</div>
</body>
