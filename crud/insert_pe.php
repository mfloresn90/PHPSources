<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
<!--
.Estilo1 {font-size: 36px}
.Estilo2 {font-size: 24px}
.Estilo3 {font-weight: bold}
.Estilo4 {font-size: 36px; font-weight: bold; }
-->
</style>
</head>

<body background="imagenes/EDIFICIOb.jpg">
<div align="center">
  <p><img src="imagenes/uaem.jpg" alt="u" width="1018" height="131" /><img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/arco.jpg" alt="ar" width="1018" height="113" /><img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/pedido.png" alt="al" width="1018" height="80" /></p>
</div>
<form id="form1" name="form1" method="post" action="i_pedido.php">
  <p align="center">
    <label for="nocta"><span class="Estilo2"><br />
    </span><span class="Estilo4">IdPedido</span></label>
    <span class="Estilo4">
    <input name="id" type="text" class="Estilo3" id="id"/>	
    </span></p>
  <p align="center" class="Estilo4">Fecha de Pedido
    <input type="text" name="fc" id="fc" />
  </p>
  <p align="center" class="Estilo4">
    <label for="ApellidoPaterno">IdFabricante</label>
    <input type="text" name="idf" id="idf" />
  </p>
  <p align="center" class="Estilo4">
    <label for="ApellidoMaterno">Cantidad</label>
  <input type="text" name="ca" id="ca">
  </p>
  <p align="center" class="Estilo4">
    <label for="ApellidoMaterno2">Importe</label>
    <input type="text" name="im" id="im" />
  </p>
  <p align="center" class="Estilo4">IdCliente
    <input type="text" name="idc" id="idc" />
  </p>
  <p align="center" class="Estilo4">IdEmpleado
    <input type="text" name="ide" id="ide" />
  </p>
  <p align="center" class="Estilo4"><span class="Estilo4">IdProducto
      <input type="text" name="idp" id="idp" />
  </span></p>
<p align="center" class="Estilo1">&nbsp;</p>
  <p align="center" class="Estilo1">
    <input name="Submit" type="submit" class="Estilo1" value="REGISTRAR" />
  </p>
</form>
<div align="center">
  <p>&nbsp;  </p>
  <form id="form2" name="form1" method="post" action="menu_pe.php">
    <p align="center">
      <label for="nocta2"></label>
      <input name="regresar" type="submit" class="Estilo1" value="REGRESAR" id="regresar" />
    </p>
  </form>
  <p>
    <map name="Map" id="Map">
      <area shape="rect" coords="40,12,323,61" href="inicio.php" />
      <area shape="rect" coords="372,11,643,57" href="principal.php" />
      <area shape="rect" coords="685,11,987,57" href="admin.php" />
    </map>
    <img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/informes.png" alt="inf" width="1018" height="124" /></p>
</div>
</body>
</html>