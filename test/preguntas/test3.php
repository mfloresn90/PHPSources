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
		$sensint9 = $_POST['sensint9'];
		$sensint10 = $_POST['sensint10'];
		$sensint11 = $_POST['sensint11'];
		$visverb9 = $_POST['visverb9'];
		$visverb10 = $_POST['visverb10'];
		$visverb11 = $_POST['visverb11'];
		$secglob9 = $_POST['secglob9'];
		$secglob10 = $_POST['secglob10'];
		$secglob11 = $_POST['secglob11'];
		$actref10 = $_POST['actref10'];
		$actref11 = $_POST['actref11'];
		
		if ( (!$sensint9) || (!$sensint10) || (!$sensint11) || (!$visverb9) || (!$visverb10) || (!$visverb11) || (!$secglob9) || (!$secglob10) || (!$secglob11) || (!$actref10) || (!$actref11) ){
			echo "<script>alert('Debes de completar el cuestionario, revisa tus respuestas.');</script>";
		}
		else {
			if ($actref10 == "a") {
				$activo += 1;
			}
			else {
				$reflexivo += 1;
			}
			
			if ($actref11 == "a") {
				$activo += 1;
			}
			else {
				$reflexivo += 1;
			}
			
			if ($sensint9 == "a") {
				$sensitivo += 1;
			}
			else {
				$intuitivo += 1;
			}
			
			if ($sensint10 == "a") {
				$sensitivo += 1;
			}
			else {
				$intuitivo += 1;
			}
			
			if ($sensint11 == "a") {
				$sensitivo += 1;
			}
			else {
				$intuitivo += 1;
			}
			
			if ($visverb9 == "a") {
				$visual += 1;
			}
			else {
				$verbal += 1;
			}
			
			if ($visverb10 == "a") {
				$visual += 1;
			}
			else {
				$verbal += 1;
			}
			
			if ($visverb11 == "a") {
				$visual += 1;
			}
			else {
				$verbal += 1;
			}
			
			if ($secglob9 == "a") {
				$secuencial += 1;
			}
			else {
				$global += 1;
			}
			
			if ($secglob10 == "a") {
				$secuencial += 1;
			}
			else {
				$global += 1;
			}
			
			if ($secglob11 == "a") {
				$secuencial += 1;
			}
			else {
				$global += 1;
			}

			$_SESSION['activo'] += $activo;
			$_SESSION['reflexivo'] += $reflexivo;
			$_SESSION['sensitivo'] += $sensitivo;
			$_SESSION['intuitivo'] += $intuitivo;
			$_SESSION['visual'] += $visual;
			$_SESSION['verbal'] += $verbal;
			$_SESSION['secuencial'] += $secuencial;
			$_SESSION['global'] += $global;

			header('Location: operations.php');
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

        <form name='test1' action='test3.php' method='POST' >
          <div class='form_settings'>
            <p>34. Considero que es mejor elogio llamar a alguien:<br>
			<input type='radio' name='sensint9' value='a'> Sensible.<br>
			<input type='radio' name='sensint9' value='b'> Imaginativo.<br>
			</p><br>
			<p>35. Cuando conozco gente en una fiesta, es más probable que recuerde :<br>
			<input type='radio' name='visverb9' value='a'> Cómo es su apariencia.<br>
			<input type='radio' name='visverb9' value='b'> Lo que dicen de sí mismos<br>
			</p><br>
			<p>36. Cuando estoy aprendiendo un tema, prefiero:<br>
			<input type='radio' name='secglob9' value='a'> Mantenerme concentrado en ese tema, aprendiendo lo más que pueda de él.<br>
			<input type='radio' name='secglob9' value='b'> Hacer conexiones entre ese tema y temas relacionados<br>
			</p><br>
			<p>37. Me considero:<br>
			<input type='radio' name='actref10' value='a'> Abierto.<br>
			<input type='radio' name='actref10' value='b'> Reservado.<br>
			</p><br>
			<p>38. Prefiero cursos que dan más importancia a:<br>
			<input type='radio' name='sensint10' value='a'> Material concreto (hechos, datos)<br>
			<input type='radio' name='sensint10' value='b'> Material abstracto (conceptos, teorías)<br>
			</p><br>
			<p>39. Para divertirme, prefiero:<br>
			<input type='radio' name='visverb10' value='a'> Ver televisión<br>
			<input type='radio' name='visverb10' value='b'> Leer un libro<br>
			</p><br>
			<p>40. Algunos  profesores  inician  sus  clases  haciendo  un  bosquejo  de  lo  que enseñarán. Esos bosquejos son:<br>
			<input type='radio' name='secglob10' value='a'> Algo útiles para mí <br>
			<input type='radio' name='secglob10' value='b'> Muy útiles para mí <br>
			</p><br>
			<p>41. La idea de hacer una tarea en grupo con una sola calificación para todos:<br>
			<input type='radio' name='actref11' value='a'> Me parece bien<br>
			<input type='radio' name='actref11' value='b'> No me parece bien<br>
			</p><br>
			<p>42. Cuando hago grandes cálculos:<br>
			<input type='radio' name='sensint11' value='a'> Tiendo a repetir todos mis pasos y revisar cuidadosamente mi trabajo<br>
			<input type='radio' name='sensint11' value='b'> Me cansa hacer su revisión y tengo que esforzarme para hacerlo<br>
			</p><br>
			<p>43.	Tiendo a recordar lugares en los que he estado:<br>
			<input type='radio' name='visverb11' value='a'> Fácilmente y con bastante exactitud <br>
			<input type='radio' name='visverb11' value='b'> Con dificultad y sin mucho detalle <br>
			</p><br>
			<p>44.  Cuando resuelvo problemas en grupo, es más probable que yo:<br>
			<input type='radio' name='secglob11' value='a'> Piense en los pasos para la solución de los problemas<br>
			<input type='radio' name='secglob11' value='b'> Piense en las posibles consecuencias o aplicaciones de la solución en un amplio rango de campos<br>
			</p><br>
            <p style='padding-top: 15px'><input class='submit' type='submit' name='next' value='Terminar' /></p>
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
