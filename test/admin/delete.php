<?php
	include ("../config/config.php");
	ob_start();
	session_start();
	if( (!isset($_SESSION["nombre"])) OR ($_SESSION["tipuser"] != "admin") ) {
		session_destroy();
		session_unset();
		echo "<script>alert('Solo el administrador puede entrar a este contenido. \\nSe cerrara la sesion!'); window.location='../';</script>"; 
		exit;
	}
	$mensaje = "";	
	$cap = 'notEq';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$iduser = $_POST['iduser'];
		
			$registro ="DELETE FROM usuarios WHERE id_usuarios = '".$iduser."'";
			$result = mysql_query($registro);
			if ($result) {
				$mensaje = "Usuario eliminado con exito.";
			}
			else
				$mensaje = "No se puede eliminar un usuario que no existe.";
	}
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Administrador <?php echo $_SESSION['nombre']; ?></title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <script src="../js/valida.js" type="text/javascript"></script>
  <script src="../js/lockchar.js" type="text/javascript"></script>
</head>

<body>
  <div id="main">
    <header>
      <div id="logo">
        <img src="../images/cabecera.png" />
      </div><br>

      <nav>
		<div id="menu_container">
          <ul class="sf-menu" id="nav">
			<li><a href="index.php">Mostrar Usuarios</a></li>
            <li><a href="delete.php">Eliminar Usuario</a></li>
            <li><a href="update.php">Actualizar Datos</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <div id="site_content">
	<div id="sidebar_container">
        <div class="sidebar">
          <h3>Administrador</h3>
          <h4><?php echo $_SESSION['nombre']; ?></h4>
          <a href="../logout/logout.php">Cerrar Sesion</a>
        </div>
      </div>
      <div class="content">
        <img style="float: left; vertical-align: middle; margin: 0 10px 0 0;" src="../images/admin.png" />
		<h1 style="margin: 15px 0 0 0;">Eliminar Usuario</h1><br>
		
		<form method="POST" name="delete_user" onsubmit="return valida2();" action="delete.php">
          <div class="form_settings">
            <p><span>Id de usuario:</span><input class="text" type="text" name="iduser" id="iduser" maxlength="7" onkeypress="return permite(event, 'num')" /></p>
            <p style="color:#FA0;"><?php echo $mensaje; ?></p>
            <p style="padding-top: 15px"><input class='submit' type='submit' name='ok' value='Eliminar' /></p>            
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
