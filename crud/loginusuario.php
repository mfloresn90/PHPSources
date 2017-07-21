<style type="text/css">
<!--
.Estilo1 {font-size: 36px}
.Estilo2 {font-size: 24px}
.Estilo3 {font-weight: bold}
.Estilo4 {font-size: 36px; font-weight: bold; }
-->
</style>
<body background="imagen/EDIFICIOb.jpg">
<div align="center"><img src="imagen/uaem.jpg" alt="u" width="1018" height="135" />
  <img src="imagen/line.jpg" alt="li" width="1018" height="31" /><img src="imagen/arco.jpg" alt="r" width="1018" height="113" /><img src="imagen/line.jpg" alt="li" width="1018" height="31" /><img src="imagen/admin.png" alt="adm" width="1018" height="80" /></div>

<div align="center">
  <p>
    <span class="Estilo1">
	
	<?php 
error_reporting(0);
session_start();
include "conecta.php";

$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

    if(	$usuario==NULL | $contrasena==NULL) 
	{echo "ingresa numero de cuenta o password."; }
	else{		
		$sql = "select usuario, nombre from Usuario where usuario = '".$usuario."' and contrasena ='".$contrasena."'"; //inserta consulta
		$sql = mysql_query($sql) or die("No se pudo realizar la consulta"); 



while($row = mysql_fetch_array($sql)) 
{ 

$con=$row[0];
$nom=$row[1];
echo $row[0];
echo $row[1];
echo'eres un administrador';
	
	$_SESSION["usuario"] = $ron[0];
           
            $_SESSION["k_username"] = $con;
           header("Location: menu.php");
}
	}

?>

</span></p>
</div>
<p align="center" class="Estilo1">&nbsp;</p>
<form id="form1" name="form1" method="post" action="clave.php">
  <p align="center">
    <label for="nocta"></label>
    <input name="Submit" type="submit" class="Estilo2" value="REGRESAR" />
  </p>
</form>
<p align="center" class="Estilo1">&nbsp;</p>
<p align="center" class="Estilo1">
  <map name="Map" id="Map">
    <area shape="rect" coords="39,10,321,57" href="inicio.php" /><area shape="rect" coords="371,13,642,57" href="principal.php" />
    <area shape="rect" coords="685,12,987,57" href="clave.php" />
  </map>
  <img src="imagen/line.jpg" alt="li" width="1018" height="31" /><img src="imagen/informes.png" alt="inf" width="1018" height="131" /></p>
</div>
</body>