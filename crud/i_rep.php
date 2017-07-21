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
  <img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/arco.jpg" alt="r" width="1018" height="113" /><img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/repventa.png" alt="aa" width="1018" height="80"></div>

<div align="center">
  <p>
    <span class="Estilo1">
    <?php
include "conecta.php"; // llamamos a la conexión al servidor y la base de datos

$idEmpleados=$_POST['id'];
$nombre=$_POST['nom'];
$edad=$_POST['ed'];
$oficina_rep=$_POST['of'];
$titulo=$_POST['ti'];
$contrato=$_POST['con'];
$director=$_POST['dir'];
$cuota=$_POST['cuo'];
$ventas=$_POST['ven'];
$idOficina=$_POST['ido'];


if ($idEmpleados==NULL | $nombre==NULL | $edad==NULL | $oficina_rep==NULL | $titulo==NULL | $contrato==NULL | $director==NULL | $cuota==NULL | $ventas==NULL | $idOficina==NULL) {echo "no se guardo, inserte dato faltante";}

else{


$alta="insert into RepVentas values ('".$idEmpleados."','".$nombre."','".$edad."','".$oficina_rep."','".$titulo."','".$contrato."','".$director."','".$cuota."','".$ventas."','".$idOficina."')";

$resul=mysql_query($alta);

if ($resul)
	echo "Se inserto un dato";
else {echo "No se puede guardar, el dato ya existe";}

}

?>
  </span></p>
</div>
<p align="center" class="Estilo1">&nbsp;</p>
<form id="form1" name="form1" method="post" action="menu_r.php">
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
