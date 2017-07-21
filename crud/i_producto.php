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
  <img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/arco.jpg" alt="r" width="1018" height="113" /><img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/producto.png" alt="aa" width="1018" height="80"></div>

<div align="center">
  <p>
    <span class="Estilo1">
    <?php
include "conecta.php"; // llamamos a la conexión al servidor y la base de datos

$idProducto=$_POST['id'];
$idFabricante=$_POST['idf'];
$descripcion=$_POST['des'];
$precio=$_POST['pre'];
$existencia=$_POST['ex'];


if ($idProducto==NULL | $idFabricante==NULL | $descripcion==NULL | $precio==NULL | $existencia==NULL) {echo "no se guardo, inserte dato faltante";}

else{


$alta="insert into Productos values ('".$idProducto."','".$idFabricante."','".$descripcion."','".$precio."','".$existencia."')";

$resul=mysql_query($alta);

if ($resul)
	echo "Se inserto un dato";
else {echo "No se puede guardar, el dato ya existe";}

}

?>
  </span></p>
</div>
<p align="center" class="Estilo1">&nbsp;</p>
<form id="form1" name="form1" method="post" action="insert_pr.php">
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
