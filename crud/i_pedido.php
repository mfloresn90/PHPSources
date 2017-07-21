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
  <img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/arco.jpg" alt="r" width="1018" height="113" /><img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/pedido.png" alt="aa" width="1018" height="80"></div>

<div align="center">
  <p>
    <span class="Estilo1">
    <?php
include "conecta.php"; // llamamos a la conexión al servidor y la base de datos

$idPedido=$_POST['id'];
$fecha_pedido=$_POST['fc'];
$idFabricante=$_POST['idf'];
$cantidad=$_POST['ca'];
$importe=$_POST['im'];
$idCliente=$_POST['idc'];
$idEmpleados=$_POST['ide'];
$idProducto=$_POST['idp'];


if ($idPedido==NULL | $fecha_pedido==NULL | $idFabricante==NULL | $cantidad==NULL | $importe==NULL | $idCliente==NULL | $idEmpleados==NULL | $idProducto==NULL) {echo "no se guardo, inserte dato faltante";}

else{


$alta="insert into pedidos values ('".$idPedido."','".$fecha_pedido."','".$idFabricante."','".$cantidad."','".$importe."','".$idCliente."','".$idEmpleados."','".$idProducto."')";

$resul=mysql_query($alta) or die("Error en: $alta: " . mysql_error());

if ($resul)
	echo "Se inserto un dato";
else {echo "No se puede guardar, el dato ya existe";}

}

?>
  </span></p>
</div>
<p align="center" class="Estilo1">&nbsp;</p>
<form id="form1" name="form1" method="post" action="menu_pe.php">
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
