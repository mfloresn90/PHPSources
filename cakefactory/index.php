<?php

	error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(E_ERROR);

	include ("config/config.php");
	include ("encode/encrypt.php");
	ob_start();
	session_start();
	$mensaje = "";
	$cap = 'notEq';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$idempleado = $_POST['iduser'];
		$encodepass = encrypt($_POST['passw'], "PcHcFeSaCv");
		$captcha = $_POST['captcha'];
		
		$stid = oci_parse($conn, "SELECT Id_Empleado FROM Empleados WHERE Id_Empleado='$idempleado'");
		$r = oci_execute($stid);
		$fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
		$id = array_shift($fila);
		
		if ($idempleado == $id) {
			$stid = oci_parse($conn, "SELECT Password FROM Empleados WHERE Id_Empleado='$idempleado'");
			$r = oci_execute($stid);
			$fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
			$pass = array_shift($fila);
			if ($encodepass == $pass) {
				$stid = oci_parse($conn, "SELECT Typuser FROM Empleados WHERE Id_Empleado='$idempleado'");
				$r = oci_execute($stid);
				$fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
				$typeuser = array_shift($fila);
				if ($captcha == $_SESSION['cap_code']) {
					$stid = oci_parse($conn, "SELECT Nombre FROM Empleados WHERE Id_Empleado='$idempleado'");
					$r = oci_execute($stid);
					$fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
					$sename = array_shift($fila);
					if($typeuser == "admin") {
						header("Location: admin/");
					}
					else if($typeuser == "mostr") {
						header("Location: user/");
					}
					else if($typeuser == "alma") {
						header("Location: stack/");
					}
					$_SESSION['idemployee']  = $id;
					$_SESSION['nameemployee']  = $sename;
					$_SESSION['typeuseremployee']  = $typeuser;
				}
				else
					$mensaje = "Captcha Invalido";
			}
			else
				$mensaje = "Contraseña invalida";
		}
		else
			$mensaje = "Usuario invalido";
    }
	oci_close($conn);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="pch32x32.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pc Health - Cake</title>
<meta name="keywords" content="Pc Health Cake" />
<meta name="description" content="Pc Health Cake, es una aplicacion web para la materia de dba." />

<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/coda-slider.css" type="text/css" charset="utf-8" />

<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
<script src="js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
<script src="js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
<script src="js/lockchar.js" type="text/javascript"></script>
<script src="js/login.js" type="text/javascript"></script>

</head>
<body>

<div id="slider">
	<div id="templatemo_wrapper">

		<div id="templatemo_social">
		<script type="text/javascript" src="js/date.js"></script>
        </div> <!-- end of social -->
        
        <div id="templatemo_main">
        	<div id="templatemo_sidebar">
            	<div id="header"><h1><a href="#">Pc Health - Cake</a></h1></div>
                
            </div> <!-- end of sidebar -->
            
            <div id="templatemo_content">
            	<div class="scroll">
	        		<div class="scrollContainer">
                                        
                    <div class="panel" id="home">
                    	<h2>Inicio de sesion</h2>
                        <p>* Llena los campos para entrar al sistema.</p>
                        
                        <div class="cleaner cleaner_h40"></div>
                        
                        <div id="contact_form">
                          <form method="POST" name="start" onsubmit="return valida1();" action="index.php">
                            <label>Id de usuario:</label>
                                <input type="text" id="iduser" name="iduser" maxlength="5" class="required input_field" onkeypress="return permite(event, 'num')" />
                                <div class="cleaner_h10"></div>
                                <label>Contrase&ntilde;a:</label>
                              <input type="password" id="passw" name="passw" maxlength="20" class="required input_field" />
                              <div class="cleaner_h10"></div>
                              <label style="width: auto;">Ingrese el contenido de la imagen:</label>
                                <input type="text" name="captcha" id="captcha" class="required input_field" maxlength="6" size="6"/>
                                <img src="captcha/captcha.php"/>
                                <div class="cleaner_h10"></div>
                                <div class="cleaner_h10"></div>
                                <p style="color:#F00;"><?php echo $mensaje; ?></p>
                                <div class="cleaner_h10"></div>
                                <input type="submit" class="submit_btn float_l" name="enviar" id="enviar" value=" Entrar" />
                            </form>
                        </div>
                        
                    </div> <!-- end of contact us -->
                    
                    </div> <!-- end scrollContainer -->
				</div>
            </div> <!-- end of content -->
            
            <div class="cleaner"></div>
        </div> <!-- end of main -->
    
    	
        <div id="templatemo_footer">
        
           	Copyright © 2013 <a href="#">Pc Health Design</a><br />
    		<a href="#" target="_parent">Pc Health Software</a> by <a href="#" target="_parent">Pc Health Headquarters</a>
            
            <div class="cleaner"></div>
		</div>       
        
    </div> <!-- end of wrapper -->
</div> <!-- end of slider -->
</html>