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
	
	$activo = $_SESSION['activo'];
	$reflexivo = $_SESSION['reflexivo'];
	$sensitivo = $_SESSION['sensitivo'];
	$intuitivo = $_SESSION['intuitivo'];
	$visual = $_SESSION['visual'];
	$verbal = $_SESSION['verbal'];
	$secuencial = $_SESSION['secuencial'];
	$global = $_SESSION['global'];
	$id_user = $_SESSION["iduser"];

	if ($activo < $reflexivo) {
		$cadactref = "b";
		$resactref = $reflexivo - $activo;
    }
	else {
		$cadactref = "a";
		$resactref = $activo - $reflexivo;
    }
	if (($resactref >= 1) && ($resactref <= 3)){
		$msj_actref = "Usted presenta un equilibrio apropiado entre los estilos Activo- Reflexivo. Este tipo de alumnos adquiere el conocimiento cuando hacen algo activo con la información (discutiéndola, aplicándola, explicándosela a otros) y a veces prefieren aprender meditando, pensando y trabajando solos a través de la reflexión o introspección por medio de memorias, ideas, lecturas, entre otras.";
	}
	else if (($resactref >= 5) && ($resactref <= 7)){
		$msj_actref = "Usted presenta una preferencia moderada hacia el estilo activo y aprenderá más fácilmente si se le brindan apoyos en esta dirección. Los estudiantes activos aprenden mejor trabajando activamente con el material de aprendizaje, aplicándolo y probando moviendo, experimentando  y manipulando cosas. Tienden a estar más interesados en la comunicación con los demás y prefieren aprender trabajando en grupos donde puedan discutir acerca del material aprendido. Aunque en menor grado, también procesa la información de forma introspectiva a través de memorias, ideas, lecturas, etc.";
	}
	else if (($resactref >= 9) && ($resactref <= 11)){
		$msj_actref = "Usted presenta una preferencia muy fuerte por  el estilo activo y puede llegar a presentar dificultades para aprender  en un ambiente en el cual no cuente con apoyo en esa dirección. Los estudiantes Activos tienden a adquirir el conocimiento haciendo algo. Es decir, retienen y comprenden mejor nueva información cuando hacen algo activo con ella (discutiéndola, aplicándola, explicándosela a otros). Prefieren aprender ensayando y trabajando en grupo. Los estudiantes con predominancia en el estilo activo se implican plenamente en nuevas experiencias y se aburren con largos plazos. ";
	}



	if ($sensitivo < $intuitivo) {
		$cadsensint = "b";
		$ressensint = $intuitivo - $sensitivo;
    }
	else {
		$cadsensint = "a";
		$ressensint = $sensitivo - $intuitivo;
   	}
	if (($ressensint >= 1) && ($ressensint <= 3)){
		$msj_ressensint = "Usted presenta un equilibrio apropiado entre los estilos Sensitivo - Intuitivo. Este tipo de estudiantes perciben la información de dos maneras: información externa o sensitiva a la vista, al oído o a las sensaciones físicas  y la información interna o intuitiva a través de memorias, ideas, lecturas, etc. Les gusta resolver problemas con procedimientos muy bien establecidos, tienden a ser pacientes con detalles; gustan de trabajo práctico además son imaginativos y aprenden  con abstracciones y formulaciones matemáticas.";
	}
	else if (($ressensint >= 5) && ($ressensint <= 7)){
		$msj_ressensint = "Usted presenta una preferencia moderada hacia el estilo sensitivo y aprenderá más fácilmente si se le brindan apoyos en esta dirección. Los alumnos sensoriales aprenden mejor cuando la información que se les presenta incluye hechos y procedimientos. Les gusta resolver problemas con procedimientos muy bien establecidos, tienden a ser pacientes con detalles; gustan de trabajo práctico (trabajo de laboratorio, por ejemplo); memorizan hechos con facilidad.";
	}
	else if (($ressensint >= 9) && ($ressensint <= 11)){
		$msj_ressensint = "Usted presenta una preferencia muy fuerte por  el estilo sensorial y puede llegar a presentar dificultades para aprender  en un ambiente en el cual no cuente con apoyo en esa dirección. Los alumnos sensoriales aprenden mejor cuando la información que se les presenta incluye hechos y procedimientos, son concretos y prácticos. Les gusta resolver problemas con procedimientos muy bien establecidos, tienden a ser pacientes con detalles; gustan de trabajo práctico (trabajo de laboratorio, por ejemplo); memorizan hechos con facilidad; no gustan de cursos a los que no les ven conexiones inmediatas con el mundo real.";
	}



	if ($visual < $verbal) {
		$cadvisverb = "b";
		$resvisverb = $verbal - $visual;
    }
	else {
		$cadvisverb = "a";
		$resvisverb = $visual - $verbal;
    }
	if (($resvisverb >= 1) && ($resvisverb <= 3)){
		$msj_resvisverb = "Usted presenta un equilibrio apropiado entre los estilos Visual - Verbal Con respecto a la información externa, los estudiantes básicamente la reciben en formatos visuales mediante cuadros, diagramas, gráficos, demostraciones, entre otros, o en formatos verbales mediante sonidos, expresión oral y escrita, fórmulas, símbolos.";
	}
	else if (($resvisverb >= 5) && ($resvisverb <= 7)){
		$msj_resvisverb = "Usted presenta una preferencia moderada hacia el estilo visual y aprenderá más fácilmente si se le brindan apoyos en esta dirección. Los alumnos visuales en la obtención de  la información prefieren representaciones visuales (imágenes, videos, diagramas, gráficos, esquemas, demostraciones, entre otros); recuerdan mejor lo que ven. Aunque en menor grado, también procesa la información de manera verbal mediante sonidos, expresión oral y escrita, fórmulas, símbolos.";
	}
	else if (($resvisverb >= 9) && ($resvisverb <= 11)){
		$msj_resvisverb = "Usted presenta una preferencia muy fuerte por  el estilo visual y puede llegar a presentar dificultades para aprender  en un ambiente en el cual no cuente con apoyo en esa dirección. Los alumnos visuales en la obtención de  la información prefieren representaciones visuales (imágenes, videos, diagramas, gráficos, esquemas, demostraciones, entre otros); recuerdan mejor lo que ven. Los estudiantes con predominancia en el estilo visual tienden a olvidar con facilidad las palabras e ideas que solo se manifiestan en forma verbal. Ellos aprenden más fácilmente las claves visuales que no incluyen palabras.";
	}



	if ($secuencial < $global) {
		$cadsecglob = "b";
		$ressecglob = $global - $secuencial;
    }
	else {
		$cadsecglob = "a";
		$ressecglob = $secuencial - $global;
    }
	if (($ressecglob >= 1) && ($ressecglob <= 3)){
		$msj_ressecglob = "Usted presenta un equilibrio apropiado entre los estilos Secuencial - Global. El progreso de los estudiantes sobre el aprendizaje implica un procedimiento secuencial que necesita progresión lógica de pasos increméntales pequeños o entendimiento global que requiere de una visión integral.";
	}
	else if (($ressecglob >= 5) && ($ressecglob <= 7)){
		$msj_ressecglob = "Usted presenta una preferencia moderada hacia el estilo secuencial y aprenderá más fácilmente si se le brindan apoyos en esta dirección. Los estudiantes secuenciales aprenden en pequeños pasos lineales, y el siguiente paso siempre está lógicamente relacionado con el anterior. Tienden a seguir caminos por  pequeños pasos lógicos cuando tratan de solucionar un problema.";
	}
	else if (($ressecglob >= 9) && ($ressecglob <= 11)){
		$msj_ressecglob = "Usted presenta una preferencia muy fuerte por  el estilo secuencial y puede llegar a presentar dificultades para aprender  en un ambiente en el cual no cuente con apoyo en esa dirección. Los estudiantes secuenciales aprenden más fácilmente a través de un material que presenta la información de manera lógica y ordenada. Solucionan los problemas de manera lineal y paso a paso. Pueden trabajar con secciones de material sin comprender el concepto completo.";
	}


	$query_actref ="INSERT INTO resultados (id_usuarios, eval, descripcion)
	VALUES ('".$id_user."', '".$resactref.$cadactref."', '".$msj_actref."')";
	$result = mysql_query($query_actref);
	
	$query_sensint ="INSERT INTO resultados (id_usuarios, eval, descripcion)
	VALUES ('".$id_user."', '".$ressensint.$cadsensint."', '".$msj_ressensint."')";
	$result = mysql_query($query_sensint);
	
	$query_visverb ="INSERT INTO resultados (id_usuarios, eval, descripcion)
	VALUES ('".$id_user."', '".$resvisverb.$cadvisverb."', '".$msj_resvisverb."')";
	$result = mysql_query($query_visverb);
	
	$query_secglob ="INSERT INTO resultados (id_usuarios, eval, descripcion)
	VALUES ('".$id_user."', '".$ressecglob.$cadsecglob."', '".$msj_ressecglob."')";
	$result = mysql_query($query_secglob);
	
	header( 'Location: ../user/');
?>