<style type="text/css">
<!--
.Estilo1 {font-size: 36px}
-->
</style>
<body background="imagenes/EDIFICIOb.jpg">
<div align="center"><img src="imagenes/uaem.jpg" alt="u" width="1018" height="135" />
  <img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/arco.jpg" alt="r" width="1018" height="113" /><img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/cliente.png" alt="baa" width="1018" height="75"></div>

<div align="center">
  <p>
    <span class="Estilo1">

<?php 
// Actualizamos en funcion del id que recibimos 
include('conecta.php'); 

$idCliente = $_POST['idCliente']; 
$empresa = $_POST['empresa']; 
$rep_CLiente = $_POST['rep_CLiente']; 
$lim_Credito = $_POST["lim_Credito"];  

$actualiza="update clientes set empresa='$empresa',rep_CLiente='$rep_CLiente',lim_Credito='$lim_Credito' where idCliente='$idCliente'"; 
mysql_query($actualiza) or die("Error en: $actualiza: " . mysql_error());    

echo " 
<p>Los datos han sido actualizados con exito.</p>  
"; 
?> 
 
</span></p>
</div>
<p align="center" class="Estilo1">&nbsp;</p>
<form id="form1" name="form1" method="post" action="actualiza_c.php">
  <p align="center">
    <label for="nocta"></label>
    <input name="Submit" type="submit" class="Estilo1" value="REGRESAR" />
  </p>
</form>
<p align="center" class="Estilo1">
 
<img src="imagenes/line.jpg" alt="li" width="1018" height="31" /><img src="imagenes/informes.png" alt="inf" width="1018" height="131" /></p>
</div>
</body>