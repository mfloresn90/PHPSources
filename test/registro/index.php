<?php
	error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(E_ERROR);
	include ("../config/config.php");
	ob_start();
	session_start();

	$mensaje = "";	
	$cap = 'notEq';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$nombre = $_POST['nombre'];
		$password = $_POST['pass'];
		$cuenta = $_POST['cuenta'];
		$fecha = $_POST['fecha'];
		$sexo = $_POST['sexo'];
		$email = $_POST['email'];
		$carrera = $_POST['carrera'];
		$captcha = $_POST['captcha'];
		
		if ($captcha == $_SESSION['cap_code']) {
			$registro ="INSERT INTO usuarios (nombre, password, ncuenta, nacimiento, sexo, email, carrera, tipuser)
			VALUES ('".$nombre."', '".$password."', '".$cuenta."', '".$fecha."', '".$sexo."', '".$email."', '".$carrera."', 'alumno')";
			$resul = mysql_query($registro);
			if ($resul) {
				$mensaje = "
					<form name='test' action='../' method='POST' >
						<div class='form_settings'>
							<p>Tus datos han sido guardados correctamente, da click para regresar al login.</p>
							<p style='padding-top: 15px'><input class='submit' type='submit' name='test' value='Regresar' /></p>
						</div> 
					</form>";
			}
			else
				$mensaje = "No se puede guardar, el usuario ya existe";
		}
		else
			$mensaje = "Captcha incorrecto, intentalo de nuevo.";
	}

?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Registro</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <script src="../js/valida.js" type="text/javascript"></script>
  
  <link type="text/css" rel="stylesheet" href="css/calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="js/calendar.js?random=20060118"></script>
<script src="../js/lockchar.js" type="text/javascript"></script>
</head>

<body>
  <div id="main">
    <header>
      <div id="logo">
        <img src="../images/cabecera.png" />
      </div><br>
      <nav>
      </nav>
    </header>
    <div id="site_content">
	
      <div class="content">
        <img style="float: left; vertical-align: middle; margin: 0 10px 0 0;" src="../images/home.png" />
		<h1 style="margin: 15px 0 0 0;">Formulario de Registro</h1><br><br>
		
		<p style='color:#F00;'><?php echo $mensaje; ?></p>

        <form method="POST" name="registro" onsubmit="return valida();" action="index.php">
          <div class='form_settings'>
            <p><span>Nombre completo:</span><input class='text' type='text' name='nombre' id='nombre' maxlength='80' /></p>
			<p><span>Contrase&ntilde;a:</span><input class='text' type='password' name='pass' id='pass' maxlength='20' /></p>
			<p><span>Numero de cuenta:</span><input class='text' type='text' name='cuenta' id='cuenta' maxlength='7' onkeypress="return permite(event, 'num')" /></p>
			<p><span>Fecha de nacimiento:</span><input class='text' type="text" readonly name='fecha' id='fecha' maxlength="10">&nbsp;&nbsp;<img style="float: rigth; vertical-align: middle; margin: 0 10px 0 0;" src="../images/cal.png" onclick="displayCalendar(document.forms[0].fecha,'yyyy-mm-dd',this)" /></p>
			<p><span>Sexo:</span><select class='select' name='sexo' id='sexo'>
              <option value="0">Seleccione uno</option>
              <option value="M">Masculino</option>
              <option value="F">Femenino</option>
            </select></p>
			<p><span>E-mail:</span><input class='text' type='text' name='email' id='email' maxlength='30' /></p>
			<p><span>Carrera:</span><select class='select' name='carrera' id='carrera'>
              <option value="0">Seleccione uno</option>
              <option value="ICO">Ingenieria</option>
              <option value="LEN">Enfermeria</option>
            </select></p>
            <p>Demuestra que eres humano:</p>
            <p><span style=' text-align:right;'><img style='color:#FFF;' src='../captcha/captcha.php'/>&nbsp;&nbsp;&nbsp;&nbsp;</span><input class='text' type='text' name='captcha' id='captcha' maxlength='5' size='6'/></p><br>
            <p style='padding-top: 15px'><input class='submit' type='submit' name='ok' value='Registrar' /></p>
          </div>  
        </form>
		
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
