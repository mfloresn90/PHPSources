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
		$visverb6 = $_POST['visverb6'];
		$visverb7 = $_POST['visverb7'];
		$visverb8 = $_POST['visverb8'];
		$secglob6 = $_POST['secglob6'];
		$secglob7 = $_POST['secglob7'];
		$secglob8 = $_POST['secglob8'];
		$actref7 = $_POST['actref7'];
		$actref8 = $_POST['actref8'];
		$actref9 = $_POST['actref9'];
		$sensint7 = $_POST['sensint7'];
		$sensint8 = $_POST['sensint8'];
		
		if ( (!$visverb6) || (!$visverb7) || (!$visverb8) || (!$secglob6) || (!$secglob7) || (!$secglob8) || (!$actref7) || (!$actref8) || (!$actref9) || (!$sensint7) || (!$sensint8) ){
			echo "<script>alert('Debes de completar el cuestionario, revisa tus respuestas.');</script>";
		}
		else {		
			if ($visverb6 == "a") {
				$visual += 1;
			}
			else
				$verbal += 1;
			if ($visverb7 == "a") {
				$visual += 1;
			}
			else
				$verbal += 1;
			if ($visverb8 == "a") {
				$visual += 1;
			}
			else
				$verbal += 1;
			
			if ($secglob6 == "a") {
				$secuencial += 1;
			}
			else
				$global += 1;
			if ($secglob7 == "a") {
				$secuencial += 1;
			}
			else
				$global += 1;
			if ($secglob8 == "a") {
				$secuencial += 1;
			}
			else
				$global += 1;
			
			if ($actref7 == "a") {
				$activo += 1;
			}
			else
				$reflexivo += 1;
			if ($actref8 == "a") {
				$activo += 1;
			}
			else
				$reflexivo += 1;
			if ($actref9 == "a") {
				$activo += 1;
			}
			else
				$reflexivo += 1;
			
			if ($sensint7 == "a") {
				$sensitivo += 1;
			}
			else
				$intuitivo += 1;
			if ($sensint8 == "a") {
				$sensitivo += 1;
			}
			else
				$intuitivo += 1;
			
			$_SESSION['activo'] += $activo;
			$_SESSION['reflexivo'] += $reflexivo;
			$_SESSION['sensitivo'] += $sensitivo;
			$_SESSION['intuitivo'] += $intuitivo;
			$_SESSION['visual'] += $visual;
			$_SESSION['verbal'] += $verbal;
			$_SESSION['secuencial'] += $secuencial;
			$_SESSION['global'] += $global;

			header('Location: test3.php');
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

        <form name='test1' action='test2.php' method='POST' >
          <div class='form_settings'>
            <p>23. Cuando alguien me da direcciones de nuevos lugares, prefiero:<br>
			<input type='radio' name='visverb6' value='a'> Un mapa.<br>
			<input type='radio' name='visverb6' value='b'> Instrucciones escritas.<br>
			</p><br>
			<p>24. Aprendo :<br>
			<input type='radio' name='secglob6' value='a'> A un paso constante. Si estudio con ahínco consigo lo que deseo.<br>
			<input type='radio' name='secglob6' value='b'> En inicios y pausas. Me llego a confundir y súbitamente lo entiendo.<br>
			</p><br>
			<p>25. Prefiero primero :<br>
			<input type='radio' name='actref7' value='a'> Hacer algo y ver que sucede.<br>
			<input type='radio' name='actref7' value='b'> Pensar como voy a hacer algo.<br>
			</p><br>
			<p>26. Cuando leo por diversión, me gustan los escritores que:<br>
			<input type='radio' name='sensint7' value='a'> Dicen claramente los que desean dar a entender.<br>
			<input type='radio' name='sensint7' value='b'> Dicen las cosas en forma creativa e interesante.<br>
			</p><br>
			<p>27. Cuando veo un esquema o bosquejo en clase, es más probable que recuerde:<br>
			<input type='radio' name='visverb7' value='a'> La imagen<br>
			<input type='radio' name='visverb7' value='b'> Lo que el profesor dijo acerca de ella<br>
			</p><br>
			<p>28. Cuando me enfrento a un cuerpo de información :<br>
			<input type='radio' name='secglob7' value='a'> Me concentro en los detalles y pierdo de vista el total de la misma<br>
			<input type='radio' name='secglob7' value='b'> Trato de entender el todo antes de ir a los detalles<br>
			</p><br>
			<p>29. Recuerdo más fácilmente:<br>
			<input type='radio' name='actref8' value='a'> Algo que he hecho<br>
			<input type='radio' name='actref8' value='b'> Algo en lo que he pensado mucho<br>
			</p><br>
			<p>30. Cuando tengo que hacer un trabajo, prefiero:<br>
			<input type='radio' name='sensint8' value='a'> Dominar una forma de hacerlo<br>
			<input type='radio' name='sensint8' value='b'> Intentar nuevas formas de hacerlo<br>
			</p><br>
			<p>31. Cuando alguien me enseña datos, prefiero :<br>
			<input type='radio' name='visverb8' value='a'> Gráficas. <br>
			<input type='radio' name='visverb8' value='b'> Resúmenes con texto<br>
			</p><br>
			<p>32. Cuando escribo un trabajo, es más probable que:<br>
			<input type='radio' name='secglob8' value='a'> Lo haga (piense o escriba) desde el principio y avance<br>
			<input type='radio' name='secglob8' value='b'> Lo haga (piense o escriba)    en diferentes partes y luego las ordene<br>
			</p><br>
			<p>33. Cuando tengo que trabajar en un proyecto de grupo, primero quiero:<br>
			<input type='radio' name='actref9' value='a'> Realizar una tormenta de ideas donde cada uno contribuye con ideas<br>
			<input type='radio' name='actref9' value='b'> Realizar la tormenta de ideas en forma personal y luego juntarme con el grupo para comparar las ideas.<br>
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
