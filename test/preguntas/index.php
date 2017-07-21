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
		$actref1 = $_POST['actref1'];
		$sensint1 = $_POST['sensint1'];
		$visverb1 = $_POST['visverb1'];
		$secglob1 = $_POST['secglob1'];
		$actref2 = $_POST['actref2'];
		$sensint2 = $_POST['sensint2'];
		$visverb2 = $_POST['visverb2'];
		$secglob2 = $_POST['secglob2'];
		$actref3 = $_POST['actref3'];
		$sensint3 = $_POST['sensint3'];
		$visverb3 = $_POST['visverb3'];
		
		if ( (!$actref1) || (!$sensint1) || (!$visverb1) || (!$secglob1) || (!$actref2) || (!$sensint2) || (!$visverb2) || (!$secglob2) || (!$actref3) || (!$sensint3) || (!$visverb3) ){
			echo "<script>alert('Debes de completar el cuestionario, revisa tus respuestas.');</script>";
		}
		else {
			if ($actref1 == "a") {
				$activo += 1;
			}
			else
				$reflexivo += 1;
			if ($actref2 == "a") {
				$activo += 1;
			}
			else
				$reflexivo += 1;
			if ($actref3 == "a") {
				$activo += 1;
			}
		
			if ($sensint1 == "a") {
				$sensitivo += 1;
			}
			else
				$intuitivo += 1;
			if ($sensint2 == "a") {
				$sensitivo += 1;
			}
			else
				$intuitivo += 1;
			if ($sensint3 == "a") {
				$sensitivo += 1;
			}
			else
				$intuitivo += 1;
	
			if ($visverb1 == "a") {
				$visual += 1;
			}
			else
				$verbal += 1;
			if ($visverb2 == "a") {
				$visual += 1;
			}
			else
				$verbal += 1;
			if ($visverb3 == "a") {
				$visual += 1;
			}
			else
				$verbal += 1;
		
			if ($secglob1 == "a") {
				$secuencial += 1;
			}
			else
				$global += 1;
		
			if ($secglob2 == "a") {
				$secuencial += 1;
			}
			else
				$global += 1;
			
			$_SESSION['activo'] += $activo;
			$_SESSION['reflexivo'] += $reflexivo;
			$_SESSION['sensitivo'] += $sensitivo;
			$_SESSION['intuitivo'] += $intuitivo;
			$_SESSION['visual'] += $visual;
			$_SESSION['verbal'] += $verbal;
			$_SESSION['secuencial'] += $secuencial;
			$_SESSION['global'] += $global;

			header('Location: test1.php');
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
		
        <form name='test' action='index.php' method='POST' onsubmit="return verif();" >
          <div class='form_settings'>
            <p>1. Entiendo mejor algo: <br>
			<input type='radio' name='actref1' id="actref1" value='a'> Si lo practico.<br>
			<input type='radio' name='actref1' id="actref1" value='b'> Si pienso en ello.<br>
			</p><br>
			2. Me considero:<br>
			<input type='radio' name='sensint1' value='a'> Realista.<br>
			<input type='radio' name='sensint1' value='b'> Inovador.<br>
			</p><br>
			<p>3. Cuando pienso acerca de lo que hice ayer, es más probable que lo haga sobre la base de:<br>
			<input type='radio' name='visverb1' value='a'> Una imagen.<br>
			<input type='radio' name='visverb1' value='b'> Palabras.<br>
			</p><br>
			<p>4. Tengo tendencia a:<br>
			<input type='radio' name='secglob1' value='a'> Entender los detalles de un tema pero no ver claramente su estructura completa.<br>
			<input type='radio' name='secglob1' value='b'> Entender la estructura completa pero no ver claramente los detalles.<br>
			</p><br>
			<p>5. Cuando estoy aprendiendo algo nuevo, me ayuda:<br>
			<input type='radio' name='actref2' value='a'> Hablar de ello<br>
			<input type='radio' name='actref2' value='b'> Pensar en ello<br>
			</p><br>
			<p>6. Si yo fuera profesor, yo preferiría dar un curso:<br>
			<input type='radio' name='sensint2' value='a'> Que trate sobre hechos y situaciones reales de la vida<br>
			<input type='radio' name='sensint2' value='b'> Que trate con ideas y teorías<br>
			</p><br>
			<p>7. Prefiero obtener información nueva de :<br>
			<input type='radio' name='visverb2' value='a'> Imágenes, diagramas, gráficas o mapas<br>
			<input type='radio' name='visverb2' value='b'> Instrucciones escritas o información verbal<br>
			</p><br>
			<p>8. Una vez que entiendo:<br>
			<input type='radio' name='secglob2' value='a'> Todas las partes, entiendo el total.<br>
			<input type='radio' name='secglob2' value='b'> El total de algo, entiendo como encajan sus partes<br>
			</p><br>
			<p>9. En un grupo de estudio que trabaja con un material difícil, es más probable que:<br>
			<input type='radio' name='actref3' value='a'> Participe y contribuya con ideas<br>
			<input type='radio' name='actref3' value='b'> No participe y solo escuche<br>
			</p><br>
			<p>10. Es m&aacute;s fácil para mí:<br>
			<input type='radio' name='sensint3' value='a'> Aprender hechos<br>
			<input type='radio' name='sensint3' value='b'> Aprender conceptos<br>
			</p><br>
			<p>11. En un libro con muchas imágenes y gráficas es más probable que:<br>
			<input type='radio' name='visverb3' value='a'> Revise cuidadosamente las imágenes y las gráficas<br>
			<input type='radio' name='visverb3' value='b'> Me concentre en el texto escrito<br>
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
