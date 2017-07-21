<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title>Portal - Estructuras de control</title>
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
		<a href="operadores.php">Operadores</a>
		<a class="active" href="estructuras.php">Estructuras de control</a>
		</div>
		
	</div>
	
	<div id="contentarea">
		<h2>Estructuras de control</h2>
	  <p>Realizar una aplicaci&oacute;n:<br>
Las edades de 5 estudiantes del turno ma&ntilde;ana.<br>
Las edades de 4 estudiantes del turno tarde.<br>
Las edades de 3 estudiantes del turno noche.<br>
Las edades de cada estudiante deben ser aletorias de entre 15 a 30 a&ntilde;os<br>
"por medio de la funci&oacute;n rand()".<br>
<br>
Nota: Sintaxis de la funci&oacute;n rand: rand($min,$max)<br>
<br>
a) Obtener el promedio de las edades de cada turno (tres promedios).<br>
b) Imprimir dichos promedios (promedio de cada turno).<br>
c) Mostrar en pantalla un mensaje que indique cual de los tres turnos tiene un promedio
de edades mayor. </p>
		<table width="500" border="1">
		  <tr>
		    <td width="241">Turno Matutino</td>
		    <td width="249">            <?php
				$min = 15;
				$max = 30;
			?>Variables: min = <?php  echo $min; ?>; max = <?php  echo $max; ?>;</td>
	      </tr>
		  <tr>
		    <td>Nombre</td>
		    <td>Edad</td>
	      </tr>
		  <tr>
		    <td>Daniel</td>
		    <td><?php
				$m1 = rand($min,$max);
				echo $m1;
				?>
            </td>
	      </tr>
		  <tr>
		    <td>Maria</td>
		    <td><?php
				$m2 = rand($min,$max);
				echo $m2;
				?></td>
	      </tr>
		  <tr>
		    <td>Jose</td>
		    <td><?php
				$m3 = rand($min,$max);
				echo $m3;
				?></td>
	      </tr>
		  <tr>
		    <td>Ana</td>
		    <td><?php
				$m4 = rand($min,$max);
				echo $m4;
				?></td>
	      </tr>
		  <tr>
		    <td>Juan</td>
		    <td><?php
				$m5 = rand($min,$max);
				echo $m5;
				?></td>
	      </tr>
		  <tr>
		    <td>Promedio</td>
		    <td><?php
				$promat = ($m1 + $m2 + $m3 + $m4 + $m5) / 5;
				echo $promat;
				?></td>
	      </tr>
	  </table>
	<p>&nbsp; </p>
	<table width="500" border="1">
		  <tr>
		    <td width="241">Turno Vespertino</td>
		    <td width="249"></td>
	      </tr>
		  <tr>
		    <td>Nombre</td>
		    <td>Edad</td>
	      </tr>
		  <tr>
		    <td>Lucia</td>
		    <td><?php
				$v1 = rand($min,$max);
				echo $v1;
				?>
            </td>
	      </tr>
		  <tr>
		    <td>David</td>
		    <td><?php
				$v2 = rand($min,$max);
				echo $v2;
				?></td>
	      </tr>
		  <tr>
		    <td>Ya</td>
		    <td><?php
				$v3 = rand($min,$max);
				echo $v3;
				?></td>
	      </tr>
		  <tr>
		    <td>Adrian</td>
		    <td><?php
				$v4 = rand($min,$max);
				echo $v4;
				?></td>
	      </tr>
		    <td>Promedio</td>
		    <td><?php
				$proves = ($v1 + $v2 + $v3 + $v4) / 4;
				echo $proves;
				?></td>
	      </tr>
	  </table>
	<p>&nbsp; </p>
	<table width="500" border="1">
		  <tr>
		    <td width="241">Turno Nocturno</td>
		    <td width="249"></td>
	      </tr>
		  <tr>
		    <td>Nombre</td>
		    <td>Edad</td>
	      </tr>
		  <tr>
		    <td>Paula</td>
		    <td><?php
				$n1 = rand($min,$max);
				echo $n1;
				?>
            </td>
	      </tr>
		  <tr>
		    <td>Angel</td>
		    <td><?php
				$n2 = rand($min,$max);
				echo $n2;
				?></td>
	      </tr>
		  <tr>
		    <td>Daniela</td>
		    <td><?php
				$n3 = rand($min,$max);
				echo $n3;
				?></td>
	      </tr>
		    <td>Promedio</td>
		    <td><?php
				$pronoc = ($n1 + $n2 + $n3) / 3;
				echo $pronoc;
				?></td>
	      </tr>
	  </table>
	  
	<?php
		if ($promat > $proves) {
			if ($promat > $pronoc) {
				echo "<script language='JavaScript'> alert('El promedio del turno matutino es mayor'); </script>";
				echo "El promedio del turno matutino es mayor";
			}
		}
		if ($proves > $promat) {
			if ($proves > $pronoc) {
				echo "<script language='JavaScript'> alert('El promedio del turno vespertino es mayor'); </script>";
				echo "El promedio del turno vespertino es mayor";
			}
		}
		if ($pronoc > $promat) {
			if ($pronoc > $proves) {
				echo "<script language='JavaScript'> alert('El promedio del turno nocturno es mayor'); </script>";
				echo "El promedio del turno nocturno es mayor";
			}
		}
		if($promat == $proves){
			if($promat == $pronoc){
				echo "<script language='JavaScript'> alert('El promedio de los 3 turnos es igual'); </script>";
				echo "Todos son iguales";
			}
		}
	?>

	</div>
	</div>
	
	<div id="footer">
		Dise&ntilde;ado por <a href="#">Flores Nicol&aacute;s Mauricio</a></div>


</div>
</body>

</html>