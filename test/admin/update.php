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
	$currentuser = $_SESSION["iduser"];
	$mensaje = "";	
	$cap = 'notEq';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$oldpass = $_POST['oldpass'];
		$newpass = $_POST['newpass'];
		$reppass = $_POST['reppass'];
		
		$query_update ="SELECT password FROM usuarios WHERE id_usuarios = '".$currentuser."'";
		$result_update = mysql_query($query_update);
		while ($row = mysql_fetch_row($result_update)){
							 $dbapass = $row[0];
					}
					
			if($dbapass == $oldpass){
				$query_update ="UPDATE usuarios SET password = '".$reppass."' WHERE id_usuarios = '".$currentuser."'";
				$result = mysql_query($query_update);
				if ($result) {
					$mensaje = "Datos actualizados.";
				}
				else
					$mensaje = "Error al actualizar datos.";
			}
			else
				$mensaje = "La contraseña actual no es correcta.";
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
		<h1 style="margin: 15px 0 0 0;">Modificar Datos</h1><br>
		
		<form method="POST" name="update_user" onsubmit="return valida3();" action="update.php">
          <div class="form_settings">
            <p><span>Contraseña actual:</span><input class="text" type="password" name="oldpass" id="oldpass" maxlength="7" onkeypress="return permite(event, 'num')" /></p>
			<p><span>Contraseña nueva:</span><input class="text" type="password" name="newpass" id="newpass" maxlength="7" onkeypress="return permite(event, 'num')" /></p>
			<p><span>Repetir contraseña:</span><input class="text" type="password" name="reppass" id="reppass" maxlength="7" onkeypress="return permite(event, 'num')" /></p>
            <p style="color:#FA0;"><?php echo $mensaje; ?></p>
            <p style="padding-top: 15px"><input class='submit' type='submit' name='ok' value='Actualizar' /></p>            
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
