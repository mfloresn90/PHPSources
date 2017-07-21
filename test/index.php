<?php
	error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(E_ERROR);
	include ("config/config.php");
	ob_start();
	session_start();
	
	$mensaje = "";
	$cap = 'notEq';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$ncuenta = $_POST['ncuenta'];
		$password = $_POST['pass'];
		$captcha = $_POST['captcha'];
		
		if ($captcha == $_SESSION['cap_code']) {
			$loginstart = "SELECT ncuenta, password, tipuser, nombre, id_usuarios FROM usuarios WHERE ncuenta = '$ncuenta'";
			$result = mysql_query($loginstart);
			
			
			while ($row = mysql_fetch_row($result)){
                 $query_ncuenta = $row[0];
				 $query_pass = $row[1];
				 $query_tipuser = $row[2];
				 $query_nombre = $row[3];
				 $query_iduser = $row[4];
			}
			
			if($query_ncuenta == $ncuenta) {
				if($query_pass == $password) {
					if($query_tipuser == "admin") {
						$_SESSION["nombre"] = $query_nombre;
						$_SESSION["ncuenta"] = $query_ncuenta;
						$_SESSION["tipuser"] = $query_tipuser;
						$_SESSION["iduser"] = $query_iduser;
						header( 'Location: admin/');
						exit;
					}
					if($query_tipuser == "alumno") {
						$query_res = "SELECT id_usuarios FROM resultados WHERE id_usuarios = '$query_iduser'";
						$result1 = mysql_query($query_res);
						while ($row1 = mysql_fetch_row($result1)){
							$query_idnval = $row1[0];
						}
						if ($query_idnval == $query_iduser) {
							$_SESSION["nombre"] = $query_nombre;
							$_SESSION["iduser"] = $query_iduser;
							$_SESSION["ncuenta"] = $query_ncuenta;
							$_SESSION["tipuser"] = $query_tipuser;
							header( 'Location: user/');
							exit;
						}
						else if ($query_idnval != $query_iduser) {
							$_SESSION["nombre"] = $query_nombre;
							$_SESSION["iduser"] = $query_iduser;
							$_SESSION["ncuenta"] = $query_ncuenta;
							$_SESSION["tipuser"] = $query_tipuser;
							header( 'Location: preguntas/');
							exit;
						}
					}
				}
				else
					echo '<script language="Javascript">alert("Password incorrecto");</script>';
			}
			else
				echo '<script language="Javascript">alert("El usuario no existe en la base de datos, registrate para acceder");</script>';
			mysql_free_result($result);
		}
		else
			$mensaje = "Captcha incorrecto, intentalo de nuevo.";
    }
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Inicia sesion</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <script src="js/valida.js" type="text/javascript"></script>
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
	  <p>Si eres usuario nuevo da click <a href="registro/">aqui</a>.</p>
      </nav>
    </header>
    <div id="site_content">
	
      <div class="content">
        <img style="float: left; vertical-align: middle; margin: 0 10px 0 0;" src="images/page.png" />
		<h1 style="margin: 15px 0 0 0;">Inicio de sesion</h1><br><br>

        <form method="POST" name="login" onsubmit="return valida1();" action="index.php">
          <div class="form_settings">
            <p><span>Numero de cuenta:</span><input class="text" type="text" name="ncuenta" id="ncuenta" maxlength="7" onkeypress="return permite(event, 'num')" /></p>
			<p><span>Contrase&ntilde;a:</span><input class="text" type="password" name="pass" id="pass" /></p>
			<p>Demuestra que eres humano:</p>
            <p><span style=" text-align:right;"><img style="color:#FFF;" src="captcha/captcha.php"/>&nbsp;&nbsp;&nbsp;&nbsp;</span><input class="text" type="text" name="captcha" id="captcha" maxlength="5" size="6"/></p><br>
            <p style="color:#FA0;"><?php echo $mensaje; ?></p>
            <p style="padding-top: 15px"><input class='submit' type='submit' name='ok' value='Entrar' /></p>            
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
