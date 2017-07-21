<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title>Portal - Operadores</title>
<LINK REL=StyleSheet HREF="css/style.css" TYPE="text/css" MEDIA=screen>
</head>

<body>
<div id="page">
	<div id="header">
	</div>
	
	<div id="mainarea">
	<div id="sidebar">
		<div id="sidebarnav">
		<a href="index.html">P&aacute;gina Principal</a>
		<a href="formulario.html">Formulario</a>
		<a href="mostrar_datos.html">Mostrar Datos</a>
		<a class="active" href="operadores.php">Operadores</a>
		<a href="estructuras.php">Estructuras de control</a>
		</div>
		
	</div>
	
	<div id="contentarea">
		<h2>Operadores</h2>
	  <p>Actividad con los Operadores Aritm&eacute;ticos y Operadores de Asignaci&oacute;n.</p>
		<table width="500" border="1">
		  <tr>
		    <td width="241">Operadores de Asignaci&oacute;n.</td>
		    <td width="249">&nbsp;</td>
	      </tr>
		  <tr>
		    <td>
            <?php
				$a = 10;
				$b = 2;
				$c = 0;				
			?>Variables: a = <?php  echo $a; ?>; b = <?php  echo $b; ?>; c = <?php  echo $c; ?>; 
			</td>
		    <td></td>
	      </tr>
		  <tr>
		    <td>Codigo Fuente</td>
		    <td>Funci&oacute;n</td>
	      </tr>
		  <tr>
		    <td>&lt;?php<br>
		      echo $c = $a;<br>
		      ?
	        &gt;</td>
		    <td><?php
				$a = 10;
				$c = 0;	
				echo $c = $a;
				?>
            </td>
	      </tr>
		  <tr>
		    <td>&lt;?php<br>
echo $a *= $b;<br>
?&gt;</td>
		    <td><?php
				$a = 10;
				$b = 2;
				echo $a *= $b;
				?></td>
	      </tr>
		  <tr>
		    <td>&lt;?php<br>
echo $a /= $b;<br>
?&gt;</td>
		    <td><?php
				$a = 10;
				$b = 2;
				echo $a /= $b;
				?></td>
	      </tr>
		  <tr>
		    <td>&lt;?php<br>
echo $a %= $b;<br>
?&gt;</td>
		    <td><?php
				$a = 10;
				$b = 2;
				echo $a %= $b;
				?></td>
	      </tr>
		  <tr>
		    <td>&lt;?php<br>
echo $a += $b;<br>
?&gt;</td>
		    <td><?php
				$a = 10;
				$b = 2;
				echo $a += $b;
				?></td>
	      </tr>
		  <tr>
		    <td>&lt;?php<br>
echo $a -= $b;<br>
?&gt;</td>
		    <td><?php
				$a = 10;
				$b = 2;
				echo $a -= $b;
				?></td>
	      </tr>
	  </table>
		<p>&nbsp; </p>
		<table width="500" border="1">
		  <tr>
		    <td width="241">Operadores de Aritm&eacute;ticos.</td>
		    <td width="249">&nbsp;</td>
	      </tr>
		  <tr>
		    <td>
            <?php
				$a = 18;
				$b = 4;
				$r = 0;
			?>Variables: a = <?php  echo $a; ?>; b = <?php  echo $b; ?>; r = <?php  echo $c; ?>;
			</td>
		    <td></td>
	      </tr>
		  <tr>
		    <td>Codigo Fuente</td>
		    <td>Funci&oacute;n</td>
	      </tr>
		  <tr>
		    <td>&lt;?php<br>
 echo $r = $a + $b;<br>
?&gt;</td>
		    <td><?php
				$a = 18;
				$b = 4;	
				$r = 0;
				echo $r = $a + $b;
				?>
            </td>
	      </tr>
		  <tr>
		    <td>&lt;?php<br>
echo $r = $a - $b;<br>
?&gt;</td>
		    <td><?php
				$a = 18;
				$b = 4;	
				$r = 0;
				echo $r = $a - $b;
				?></td>
	      </tr>
		  <tr>
		    <td>&lt;?php<br>
echo $r = $a * $b;<br>
?&gt;</td>
		    <td><?php
				$a = 18;
				$b = 4;	
				$r = 0;
				echo $r = $a * $b;
				?></td>
	      </tr>
		  <tr>
		    <td>&lt;?php<br>
echo $r = $a / $b;<br>
?&gt;</td>
		    <td><?php
				$a = 18;
				$b = 4;	
				$r = 0;
				echo $r = $a / $b;
				?></td>
	      </tr>
		  <tr>
		    <td>&lt;?php<br>
echo $r = $a % $b;<br>
?&gt;</td>
		    <td><?php
				$a = 18;
				$b = 4;	
				$r = 0;
				echo $r = $a % $b;
				?></td>
	      </tr>
	  </table>
	
	</div>
	</div>
	
	<div id="footer">
		Dise&ntilde;ado por <a href="#">Flores Nicol&aacute;s Mauricio</a></div>


</div>
</body>

</html>