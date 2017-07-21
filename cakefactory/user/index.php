<?php

	error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(E_ERROR);
	include ("../config/config.php");
	include ("../encode/encrypt.php");
	ob_start();
	session_start();
	if( (!isset($_SESSION["nameemployee"])) OR ($_SESSION["typeuseremployee"] != "mostr") ) {
		session_destroy();
		session_unset();
		echo "<script>alert('Solo el empleado de mostrador puede entrar a este contenido. \\nInicia sesion como mostrador!'); window.location='../';</script>"; 
		exit;
	}
	
	$changepass = "";
	$cap = 'notEq';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$oldpass = encrypt($_POST['oldpass'],"PcHcFeSaCv");
		$newpass = encrypt($_POST['newpass'],"PcHcFeSaCv");
		$reppass = encrypt($_POST['reppass'],"PcHcFeSaCv");
		
		if($newpass == $reppass) {
			$idcurrentuser = $_SESSION['idemployee'];
			$stid = oci_parse($conn, "SELECT Password FROM Empleados WHERE Id_Empleado = '$idcurrentuser'");
			$r = oci_execute($stid);
			$fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
			$oldpassword = array_shift($fila);
			
			if ($oldpassword == $oldpass) {
				$query_uppass = "UPDATE Empleados SET Password = '".$reppass."' WHERE Id_Empleado = '".$idcurrentuser."'";
				$stmt = oci_parse($conn, $query_uppass);
				$rc = oci_execute($stmt);
				oci_commit($conn);
				oci_free_statement($stmt);
				$changepass = "Tu contraseña ha sido cambiada con exito!!'";
			}
			else
				$changepass = "Tu contraseña actual no es correcta.<br>Intentalo de nuevo!!'";
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../pch32x32.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pc Health - Cake (<?php echo $_SESSION['nameemployee']; ?>)</title>
<meta name="keywords" content="Pc Health Cake" />
<meta name="description" content="Pc Health Cake, es una aplicacion web para la materia de dba." />
<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="../css/coda-slider.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="../css/estilos.css" type="text/css" charset="utf-8" />

<script src="../js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="../js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
<script src="../js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/lockchar.js" type="text/javascript"></script>
<script src="../js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/sales.js" type="text/javascript"></script>
<script src="../js/passstrength.js" type="text/javascript"></script>
</head>
<body>

<div id="slider">
	<div id="templatemo_wrapper">

		<div id="templatemo_social">
        <script type="text/javascript" src="../js/date.js"></script><br />
            <a href="../logout/logout.php">Cerrar Sesion</a>
        </div> <!-- end of social -->
        
        <div id="templatemo_main">
        	<div id="templatemo_sidebar">
            	<div id="header"><h1><a href="#">Pc Health - Cake</a></h1></div>
                
				<div id="menu">
                    <ul class="navigation">
                    <li><a href="#inicio" class="selected">Venta</a></li>
                    <li><a href="#profile">Perfil</a></li>
                    </ul>
                </div>
            </div> <!-- end of sidebar -->
            
            <div id="templatemo_content">
            	<div class="scroll">
	        		<div class="scrollContainer">
                                        
                    <div class="panel" id="inicio">
                        <h2>Bienvenido <?php echo $_SESSION['nameemployee']; ?></h2>
						<p>Esta es tu interface de venta.</p>
                        <div class="cleaner cleaner_h10"></div>
                        
						<?php
							$query_employee = "SELECT Nombre FROM Productos";
							$stid = oci_parse($conn, $query_employee);
							$r = oci_execute($stid);
						?>
						
                        <div id="contact_form">
                            <form method="POST" name="sales" action="../factura/fact.php" onsubmit="return valida();">
                                <label>Producto:</label>
                                <select name="product" id="product" class="required input_field">
									<option value="0">-- Seleccione uno --</option>
									<?php
										while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
											foreach ($row as $item) {
												echo '<option value="'.($item !== null ? htmlentities($item, ENT_QUOTES) : '').'">'.($item !== null ? htmlentities($item, ENT_QUOTES) : '').'</option>';
											}
										}
									?>
                                </select>
                                <div class="cleaner_h10"></div>
								<label>Cantidad:</label>
                                <input type="text" id="cantidad" name="cantidad" class="required input_field" onkeypress="return permite(event, 'num')" maxlength="3" />
                                <div class="cleaner_h10"></div>
                                <label style="width: auto;">Cantidad entregada:</label>
                                <input type="text" id="cantent" name="cantent" class="required input_field" onkeypress="return permite(event, 'num')" maxlength="10" />
                                <div class="cleaner_h10"></div>
                                <input type="submit" class="submit_btn float_l" name="sell" id="sell" value="Aceptar" />
                                
                                </form>
                        </div>
                        
                    </div>
					
                    <div class="panel" id="profile">
                        <h2>Perfil de usuario</h2>
						<p>Te recomendamos cambiar la contraseña que se te dio por defecto.</p>	
                        <div class="cleaner cleaner_h10"></div>
                        
                        <div id="contact_form">
                            <form method="POST" name="updatepass" action="index.php#profile" onsubmit="return valida1();">
								<label style="width: auto;">Contraseña actual:</label>
                                <input type="password" id="oldpass" name="oldpass" class="required input_field" maxlength="20" />
                                <div class="cleaner_h10"></div>
								<label style="width: auto;">Contraseña nueva:</label>
                                <input type="password" id="newpass" name="newpass" class="required input_field" maxlength="20" onkeyup="passstrength(this.value)" />
								<div id="passwordDescription"></div>
								<div id="passwordStrength" class="strength0"></div>
                                <div class="cleaner_h10"></div>
								<label style="width: auto;">Repetir contraseña:</label>
                                <input type="password" id="reppass" name="reppass" class="required input_field" maxlength="20" />
                                <div class="cleaner_h10"></div>
                                <div class="cleaner_h10"></div>
                                <p style="color:#F00;"><?php echo $changepass; ?></p>
                                <input type="submit" class="submit_btn float_l" name="passcha" id="passcha" value="Aceptar" />
                                
                                </form>
                        </div>
                    </div>
                    
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