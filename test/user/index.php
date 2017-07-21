<?php
	include ("../config/config.php");
	ob_start();
	session_start();
		if( (!isset($_SESSION["nombre"])) OR ($_SESSION["tipuser"] != "alumno") ) {
		session_destroy();
		session_unset();
		echo "<script>alert('Solo el alumno puede entrar a este contenido. \\nSe cerrara la sesion!'); window.location='../';</script>";
		exit;
	}
	$id_user = $_SESSION["iduser"];
	$query_user = "SELECT * FROM usuarios WHERE id_usuarios = '$id_user'";
	$result_user = mysql_query($query_user);
	
	while ($row = mysql_fetch_row($result_user)){
        $query_id_user = $row[0];
		$query_nombre = $row[1];
		$query_password = $row[2];
		$query_ncuenta = $row[3];
		$query_nacimiento = $row[4];
		$query_sexo = $row[5];
		$query_email = $row[6];
		$query_carrera = $row[7];
		$query_tipo_user = $row[8];
	}
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Resultados de <?php echo $_SESSION['nombre']; ?></title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
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
			<li><a href="index.php">Mostrar Resultados</a></li>
            <li><a href="update.php">Actualizar Datos</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <h3>Numero de cuenta:<br> <?php echo $query_ncuenta; ?></h3>
          <h4>Nombre:<br> <?php echo $query_nombre; ?></h4>
          <h5>Tipo de usuario:<br> <?php echo $query_tipo_user; ?></h5>
		  <h5>E-mail:<br> <?php echo $query_email; ?></h5>
		  <h5>Fecha de nacimiento:<br> <?php echo $query_nacimiento; ?></h5>
		  <h5>Sexo:<br> <?php echo $query_sexo; ?></h5>
		  <h5>Carrera:<br> <?php echo $query_carrera; ?></h5>
		  
          <a href="../logout/logout.php">Cerrar Sesion</a>
        </div>
      </div>
      <div class="content">
        <img style="float: left; vertical-align: middle; margin: 0 10px 0 0;" src="../images/login.png" />
		<h1 style="margin: 15px 0 0 0;">Resultados de <?php echo $_SESSION['nombre']; ?></h1><br>
		<div class="tablestyle" >
		<?php
			
			$id_user = $_SESSION["iduser"];
			
			$query_users = "SELECT eval, descripcion FROM resultados WHERE id_usuarios = $id_user";
			$result = mysql_query($query_users);
			echo "<table border=’1′>
					<tr>
						<td>Evaluacion</td>
						<td>Descripcion</td>
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
