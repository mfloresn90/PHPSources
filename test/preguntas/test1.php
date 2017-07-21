<?php
	error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(E_ERROR);
	include ("../config/config.php");
	ob_start();
	session_start();
	$id_user = $_SESSION["iduser"];
	$query_user = "SELECT id_usuarios FROM resultados WHERE id_usuarios = '$id_user'";
	$result_user = mysql_query($query_user);
	while ($row = mysql_fetch_row($result_user)){
        $query_id_user = $row[0];
	}
	if( (!isset($_SESSION["nombre"])) OR ($_SESSION["tipuser"] != "alumno") ) {
		session_destroy();
		session_unset();
		echo "<script>alert('Solo el alumno puede realizar el test.'); window.location='../';</script>";
		exit;
	}
	if($id_user == $query_id_user) {
		session_destroy();
		session_unset();
		echo "<script>alert('No es necesario realizar el test, se cerrara la sesion.'); window.location='../';</script>";
		exit;
	}
	
	$activo = 0;
	$reflexivo = 0;
	$sensitivo = 0;
	$intuitivo = 0;
	$visual = 0;
	$verbal = 0;
	$secuencial = 0;
	$global = 0;
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$secglob3 = $_POST['secglob3'];
		$actref4 = $_POST['actref4'];
		$sensint4 = $_POST['sensint4'];
		$visverb4 = $_POST['visverb4'];
		$secglob4 = $_POST['secglob4'];
		$actref5 = $_POST['actref5'];
		$sensint5 = $_POST['sensint5'];
		$visverb5 = $_POST['visverb5'];
		$secglob5 = $_POST['secglob5'];
		$actref6 = $_POST['actref6'];
		$sensint6 = $_POST['sensint6'];
		
		if ( (!$secglob3) || (!$actref4) || (!$sensint4) || (!$visverb4) || (!$secglob4) || (!$actref5) || (!$sensint5) || (!$visverb5) || (!$secglob5) || (!$actref6) || (!$sensint6) ){
			echo "<script>alert('Debes de completar el cuestionario, revisa tus respuestas.');</script>";
		}
		else {
			if ($secglob3 == "a") {
				$secuencial += 1;
			}
			else 
				$global += 1;
			if ($secglob4 == "a") {
				$secuencial += 1;
			}
			else
				$global += 1;
			if ($secglob5 == "a") {
				$secuencial += 1;
			}
			else
				$global += 1;
		
			if ($actref4 == "a") {
				$activo += 1;
			}
			else 
				$reflexivo += 1;
			if ($actref5 == "a") {
				$activo += 1;
			}
			else
				$reflexivo += 1;
			if ($actref6 == "a") {
				$activo += 1;
			}
			else
				$reflexivo += 1;
		
			if ($sensint4 == "a") {
				$sensitivo += 1;
			}
			else
				$intuitivo += 1;
			if ($sensint5 == "a") {
				$sensitivo += 1;
			}
			else
				$intuitivo += 1;
			if ($sensint6 == "a") {
				$sensitivo += 1;
			}
			else
				$intuitivo += 1;
			
			if ($visverb4 == "a") {
				$visual += 1;
			}
			else
				$verbal += 1;
			if ($visverb5 == "a") {
				$visual += 1;
			}
			else
				$verbal += 1;
		
			$_SESSION['activo'] += $activo;
			$_SESSION['reflexivo'] += $reflexivo;
			$_SESSION['sensitivo'] += $sensitivo;
			$_SESSION['intuitivo'] += $intuitivo;
			$_SESSION['visual'] += $visual;
			$_SESSION['verbal'] += $verbal;
			$_SESSION['secuencial'] += $secuencial;
			$_SESSION['global'] += $global;

			header('Location: test2.php');
		}
    }
	
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Test de <?php echo $_SESSION['nombre']; ?></title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="../js/modernizr-1.5.min.js"></script>
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
        <img style="float: left; vertical-align: middle; margin: 0 10px 0 0;" src="../images/browser.png" />
		<h1 style="margin: 15px 0 0 0;">Test Estilo de Aprendizaje</h1><br><br>
        <p style="text-align:justify;"><strong>INSTRUCCIONES:</strong>
		Por favor <?php echo $_SESSION['nombre']; ?> selecciona solamente una respuesta para cada pregunta. Si aplicas ambas,
		selecciona aquella que se aplique más frecuentemente. Por favor ten en cuenta lo siguiente:<br>
		<strong>a)</strong>
		Si dejas una respuesta en blanco el sistema te pedira llenar el formulario de nuevo, por favor tomate tu tiempo.<br>
		<strong>b)</strong>
		No actualices en navegador ya que el formulario se limpiara de nuevo.<br></p>
        <form name='test1' action='test1.php' method='POST' >
          <div class='form_settings'>
            <p>12. Cuando resuelvo problemas de matemáticas:<br>
			<input type='radio' name='secglob3' value='a'> Generalmente trabajo sobre las soluciones con un paso a la vez.<br>
			<input type='radio' name='secglob3' value='b'> Frecuentemente sé cuales son las soluciones, pero luego tengo dificultad para imaginarme los pasos para llegar a ellas<br>
			</p><br>
			<p>13. En las clases a las que he asistido:<br>
			<input type='radio' name='actref4' value='a'> He llegado a saber como son muchos de los estudiantes.<br>
			<input type='radio' name='actref4' value='b'> Raramente he llegado a saber como son muchos estudiantes.<br>
			</p><br>
			<p>14. Cuando leo temas que no son de ficción, prefiero:<br>
			<input type='radio' name='sensint4' value='a'> Algo que me enseñe nuevos hechos o me diga como hacer algo.<br>
			<input type='radio' name='sensint4' value='b'> Algo que me dé nuevas ideas en que pensar<br>
			</p><br>
			<p>15. Me gustan los maestros:<br>
			<input type='radio' name='visverb4' value='a'> Que utilizan muchos esquemas en el pizarrón.<br>
			<input type='radio' name='visverb4' value='b'> Que toman mucho tiempo para explicar.<br>
			</p><br>
			<p>16. Cuando estoy analizando un cuento o una novela:<br>
			<input type='radio' name='secglob4' value='a'> Pienso en los incidentes y trato de acomodarlos para configurar los temas<br>
			<input type='radio' name='secglob4' value='b'> Me doy cuenta de cuales son los temas cuando termino de leer y luego tengo que regresar y encontrar los incidentes que los demuestran<br>
			</p><br>
			<p>17. Cuando comienzo a resolver un problema de tarea, es más probable que:<br>
			<input type='radio' name='actref5' value='a'> Comience a trabajar en su solución inmediatamente<br>
			<input type='radio' name='actref5' value='b'> Primero trate de entender completamente el problema<br>
			</p><br>
			<p>18. Prefiero la idea de:<br>
			<input type='radio' name='sensint5' value='a'> Certeza<br>
			<input type='radio' name='sensint5' value='b'> Teoría<br>
			</p><br>
			<p>19. Recuerdo mejor:<br>
			<input type='radio' name='visverb5' value='a'> Lo que veo<br>
			<input type='radio' name='visverb5' value='b'> Lo que oigo<br>
			</p><br>
			<p>20. Es más importante para mí que un profesor:<br>
			<input type='radio' name='secglob5' value='a'> Exponga el material en pasos secuenciales claros<br>
			<input type='radio' name='secglob5' value='b'> Me dé un panorama general y relacione el material con otros temas<br>
			</p><br>
			<p>21. Prefiero estudiar:<br>
			<input type='radio' name='actref6' value='a'> En un grupo de estudio<br>
			<input type='radio' name='actref6' value='b'> Solo<br>
			</p><br>
			<p>22. Me considero :<br>
			<input type='radio' name='sensint6' value='a'> Cuidadoso en los detalles de mi trabajo<br>
			<input type='radio' name='sensint6' value='b'> Creativo en la forma en la que hago mi trabajo<br>
			</p><br>
            <p style='padding-top: 15px'><input class='submit' type='submit' name='next' value='Siguente' /></p>
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
