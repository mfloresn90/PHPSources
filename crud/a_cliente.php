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

include('conecta.php');   

$idCliente = $_POST['idCliente'];
    $query = "select * from clientes where idCliente = '$idCliente'"; 
    $result = mysql_query($query) or die("Error en: $query: " . mysql_error()); 

while ($registro = mysql_fetch_array($result)){ 

echo " 
<body> 

<div align='center'> 
    <table border='0' width='600' style='font-family: Verdana; font-size: 8pt' id='table1'> 
        <tr> 
            <td colspan='2'><h3 align='center'>Actualice los datos que considere</h3></td> 
        </tr> 
        <tr> 
            <td colspan='2'>En los campos del formulario puede ver los valores actuales,  
            si no se cambian los valores se mantienen iguales.</td> 
        </tr> 
        <form method='POST' action='actualiza1.php'> 
        <tr> 
            <td width='50%'>&nbsp;</td> 
            <td width='50%'>&nbsp;</td> 
        </tr> 
        <tr> 
            <td width='50%'><p align='center'><b>Empresa: </b></td> 
            <td width='50%'><p align='center'><input type='text' name='empresa' size='20' value='".$registro['empresa']."'></td> 
        </tr> 
        <tr> 
            <td width='50%'><p align='center'><b>representante del Cliente:</b></td> 
            <td width='50%'><p align='center'><input type='text' name='rep_CLiente' size='20' value='".$registro['rep_CLiente']."'></td> 
        </tr> 
        <tr> 
		    <td width='50%'><p align='center'><b>Limite de Credito:</b></td> 
            <td width='50%'><p align='center'><input type='text' name='lim_Credito' size='20' value='".$registro['lim_Credito']."'></td> 
        </tr> 
        <tr> 
            <td width='50%'>&nbsp;</td> 
            <td width='50%'>&nbsp;</td> 
        </tr> 
        <input type='hidden' name='idCliente' value='$idCliente'> 
        <tr> 
            <td width='100%' colspan='2'> 
            <p align='center'> 
            <input type='submit' value='Actualizar datos' name='B1'></td> 
        </tr> 
        </form> 
    </table> 
</div> 
"; 
} 
   
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

