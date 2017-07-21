<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
.Estilo1 {font-size: 36px}
</style>
</head>

<body background="imagenes/EDIFICIOb.jpg">
<div align="center">
  <p><img src="imagenes/uaem.jpg" alt="u" width="1018" height="120" />
  <img src="imagenes/line.jpg" alt="l" width="1018" height="31" /><img src="imagenes/arco.jpg" alt="aa" width="1018" height="113" /><img src="imagenes/line.jpg" alt="l" width="1018" height="31" /><img src="imagenes/pedido.png" width="1018" height="80" /></p>
  <p> <img src="imagenes/i_pedido.png" width="340" height="110" border="0" usemap="#Map2" />
    <map name="Map2" id="Map2">
      <area shape="rect" coords="85,3,254,92" href="insert_pe.php" />
    </map>
  <img src="imagenes/e_pedido.png" width="340" height="110" border="0" usemap="#Map3" />
  <map name="Map3" id="Map3">
    <area shape="rect" coords="85,3,254,90" href="eliminar_pe.php" />
  </map>
  </p>
  <p><img src="imagenes/l_pedido.png" width="340" height="110" border="0" usemap="#Map" />
    <map name="Map" id="Map">
      <area shape="rect" coords="84,1,254,91" href="l_pedido.php" />
    </map>
    <map name="MapMap" id="MapMap">
      <area shape="rect" coords="85,1,255,91" href="consultas.php" />
    </map>
  </p>
  <form id="form1" name="form1" method="post" action="menu.php">
    <p align="center">
      <label for="nocta"></label>
      <input name="Submit" type="submit" class="Estilo1" value="REGRESAR" />
    </p>
  </form>
  <p>&nbsp;</p>
<p>
  </map>
  <img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/informes.png" alt="in" width="1018" height="128" /></p>
</p>
</div>
</body>

<?php 

error_reporting(0);
session_start();
include "conecta.php";


?>
</html>