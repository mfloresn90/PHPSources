<?php
	session_start();
	$mensaje = "";
	$cap = 'notEq';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$captcha = $_POST['captcha'];
		if ($username == "admin" && $password == "admin" &&$captcha == $_SESSION['cap_code']) {
		header('Location: adminstart.html');
    	}
		elseif ($username == "mauricio" && $password == "mauricio" &&$captcha == $_SESSION['cap_code']) {
		header('Location: userstart.html');
    	}
		else {
			$mensaje = "Usuario invalido.";
		}
    }
?>
<!DOCTYPE HTML>
<html>

<head>
<link rel="shortcut icon" href="pch32x32.ico" type="image/x-icon">
  <title>Pc Health Library - Login</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>

<body>
  <div id="main">
    <header>
      <div id="logo">
        <div id="logo_text">
          <h1><a href="#"><img src="images/pchly_300x150.png"></a></h1>
          <h2><script type="text/javascript" src="js/frase.js"></script></h2>
        </div>
      </div><br>

      <nav>
      </nav>
    </header>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <h3>Ultimas noticias</h3>
          <h4>Nuevo material digital adquirido</h4>
          <h5>Septiembre 17, 2013</h5>
          <p>Carta al padre - Franz Kafka<br>
          El extranjero - Albert Camus<br>
          El t&uacute;nel - Ernesto S&aacute;bato<br>
          Los 4 acuerdos - Miguel Ruiz<br>
		  Y muchos m&aacute;s.....</p>
        </div>
      </div>
      <br>
      <div class="content">
        <img style="float: left; vertical-align: middle; margin: 0 10px 0 0;" src="images/home.png" alt="home" /><h1 style="margin: 15px 0 0 0;">Iniciar Sesi&oacute;n</h1><br><br>

        <form name="login" action="index.php" method="POST" >
          <div class="form_settings">
            <p><span>Nombre de usuario:</span><input type="text" name="username" id="username" /></p>
            <p><span>Contrase&ntilde;a:</span><input type="password" name="password" id="password" /></p>
            <p>Demuestra que eres humano:</p>
            <p><span style=" text-align:right;"><img style="color:#FFF;" src="captcha.php"/>&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="text" name="captcha" id="captcha" maxlength="6" size="6"/></p><br>
            <p style="color:#F00;"><?php echo $mensaje; ?></p>
            <p style="padding-top: 15px"><input class="submit" type="submit" name="name" value="Iniciar" /></p>            
          </div>
        </form>
      </div>
    </div>
    <footer>
      <p>Copyright &copy; 2013 | <a href="http://pchealth.net16.net">Powered by Pc Health</a></p>
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
