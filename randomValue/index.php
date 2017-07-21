<?php
	error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(E_ERROR);
	include ("config/config.php");
	ob_start();
	session_start();
	
	$mensaje = "";
	$seleccion = "";
	$lista = "";
	$cap = 'notEq';
	$counter = 0;
	
	function selection($aleatorio) {
		$query_seleccion = "SELECT n_de_lista FROM seleccionados";
		$result_sccn = mysql_query($query_seleccion);
		while ($row_select = mysql_fetch_row($result_sccn)) {
			if ($row_select[0] == $aleatorio){
				$counter++;
			}
		}
		if ($counter > 0) {
			$counter = 0;
			$numero = rand (1, 32);
			selection($numero);
		}
	}
			
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$captcha = $_POST['captcha'];
		
		if ($captcha == $_SESSION['cap_code']) {

			$numero = rand (1, 32);
			selection($numero); 
			
			if ($counter == 0) {
				$query_afortunado = "SELECT * FROM `lista_alumnos` WHERE n_de_lista = ".$numero;
				$result_afortunado = mysql_query($query_afortunado);
				while ($row_afortunado = mysql_fetch_row($result_afortunado)) {
					$afortunado ="INSERT INTO seleccionados (n_de_lista, nombre)
					VALUES ('".$row_afortunado[0]."', '".$row_afortunado[1]."')";
					$resul = mysql_query($afortunado);
				}
			}

		}
		else
			$mensaje = "Error en envío de solicitud";
			
    }
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Ejemplo de diagrama de Nivel 2</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <script src="js/lockchar.js" type="text/javascript"></script>
</head>

<body>
  <div id="main">
    <header>
      <div id="logo">
        <img src="images/cabecera.png" />
      </div><br>

      <nav>
	  <br>
	  <p></p>
      </nav>
    </header>
    <div id="site_content">
	
      <div class="content">
        <img style="float: left; vertical-align: middle; margin: 0 10px 0 0;" src="images/page.png" />
		<h1 style="margin: 15px 0 0 0;">Lista de participaciones</h1><br><br>

        <form method="POST" name="login" onsubmit="return valida1();" action="index.php">
          <div class="form_settings">
			<p>Enviar Solicitud:</p>
            <p><span style=" text-align:right;"><img style="color:#FFF;" src="captcha/captcha.php"/>&nbsp;&nbsp;&nbsp;&nbsp;</span><input class="text" type="text" name="captcha" id="captcha" maxlength="5" size="6"/></p><br>
            <p style="color:#FA0;"><?php echo $mensaje; ?></p>
            <p style="padding-top: 15px"><input class='submit' type='submit' name='ok' value='Entrar' /></p>            
          </div>
        </form>
        <p></p>
        <p style="color:#FA0;"><?php echo $seleccion; ?></p>
        <p style="color:#FA0;"><?php echo $lista; ?></p>
        <div class="tablestyle" >
		<?php
			$query_users = "SELECT * FROM seleccionados";
			$result = mysql_query($query_users);
			echo "<table border=’1′>
					<tr>
						<td>No. de Lista</td>
						<td>Nombre afortunado</td>
					</tr>";
					while ($row = mysql_fetch_row($result)){
						echo "<tr>";
						echo "<td>".$row[0]."</td>
							 <td>".$row[1]."</td>";
						echo "</tr>";
					}
			echo "</table>";
		?>
		</div>
      </div>
    </div>
    <footer>
      
    </footer>
  </div>
  <p>&nbsp;</p>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>
