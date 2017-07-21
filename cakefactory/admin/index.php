<?php

	error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(E_ERROR);
	include ("../config/config.php");
	include ("../encode/encrypt.php");
	ob_start();
	session_start();
	if( (!isset($_SESSION["nameemployee"])) OR ($_SESSION["typeuseremployee"] != "admin") ) {
		session_destroy();
		session_unset();
		echo "<script>alert('Solo el administrador puede entrar a este contenido. \\nInicia sesion como administrador!'); window.location='../';</script>"; 
		exit;
	}

	$adduser = "";
	$downuser = "";
	$upprov = "";
	$changepass = "";
	$cap = 'notEq';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$typeuser = $_POST['typeuser'];
		$encodepass = encrypt("123456","PcHcFeSaCv");
		$iduser = $_POST['iduser'];
		$concept = $_POST['concept'];
		$nameprov = $_POST['nameprov'];
		$rfc = $_POST['rfc'];
		$addressprov = $_POST['addressprov'];
		$phoneprov = $_POST['phoneprov'];
		$oldpass = encrypt($_POST['oldpass'],"PcHcFeSaCv");
		$newpass = encrypt($_POST['newpass'],"PcHcFeSaCv");
		$reppass = encrypt($_POST['reppass'],"PcHcFeSaCv");
		
		
		if($typeuser == "admin" OR $typeuser == "mostr" OR $typeuser == "alma") {
			$querry = "INSERT INTO Empleados(Id_Empleado, Nombre, Apellidos, Direccion, Password, Typuser, Telefono)
			VALUES (empleados_sequence.nextval, '".$name."', '".$lastname."', '".$address."', '".$encodepass."', '".$typeuser."', '".$phone."')";
			$stmt = oci_parse($conn, $querry);
			$rc=oci_execute($stmt);
			oci_commit($conn);
			oci_free_statement($stmt);
			$adduser = "Usuario agregado con exito!!.";
		}
		else if($concept != "") {
			
			$stid = oci_parse($conn, "SELECT Nombre FROM Empleados WHERE Id_Empleado='$iduser'");
			$r = oci_execute($stid);
			$fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
			$nombre_down = array_shift($fila);
			
			$stid = oci_parse($conn, "SELECT Apellidos FROM Empleados WHERE Id_Empleado='$iduser'");
			$r = oci_execute($stid);
			$fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
			$apellidos_down = array_shift($fila);
		
			$querry = "INSERT INTO Baja_Empleados(Id_Baja, Nombre, Concepto)
			VALUES (bajaemp_sequence.nextval, '".$nombre_down." ".$apellidos_down."', '".$concept."')";
			$stmt = oci_parse($conn, $querry);
			$rc=oci_execute($stmt);
			oci_commit($conn);
			oci_free_statement($stmt);
			
			$querydelete = "DELETE FROM Empleados WHERE Id_Empleado = ".$iduser;
			$stmt = oci_parse($conn, $querydelete);
			$rc = oci_execute($stmt);
			oci_commit($conn);
			oci_free_statement($stmt);
			$downuser = "Usuario dado de baja.";
		}
		else if($phoneprov != "") {
			$querry = "INSERT INTO Proveedor(Id_Proveedor, Nombre, Direccion, RFC, Telefono)
			VALUES (proveedor_sequence.nextval, '".$nameprov."', '".$addressprov."', '".$rfc."', '".$phoneprov."')";
			$stmt = oci_parse($conn, $querry);
			$rc=oci_execute($stmt);
			oci_commit($conn);
			oci_free_statement($stmt);
			$upprov = "Proveedor agregado con exito!!.";
		}
		else if($newpass == $reppass) {
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
<title>Pc Health - Cake (<?php echo $_SESSION['nameemployee']; ?>) </title>
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
<script src="../js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/lockchar.js" type="text/javascript"></script>
<script src="../js/counter.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/upser.js" type="text/javascript"></script>
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
                    <li><a href="#inicio" class="selected">Inicio</a></li>
                    <li><a href="#alem">Alta Empleado</a></li>
                    <li><a href="#baem">Baja Empleado</a></li>
					<li><a href="#alprov">Alta Proveedor</a></li>
					<li><a href="#viewempl">Empleados</a></li>
                    <li><a href="#stack">Almacen</a></li>
					<li><a href="#proveedor">Proveedores</a></li>
					<li><a href="#profile">Perfil</a></li>
                    </ul>
                </div>
            </div> <!-- end of sidebar -->
            
            <div id="templatemo_content">
            	<div class="scroll">
	        		<div class="scrollContainer">
                                        
                    <div class="panel" id="home">
                        <h2>Bienvenido <?php echo $_SESSION['nameemployee']; ?></h2>   
                        
                        <p><em>En esta seccion puedes dar de alta a tus empleados, colocando los datos que tu le solicites o tomes mas relevantes para que entre a tu negocio.</em></p>	
                        <img src="../images/templatemo_image_01.jpg" alt="Image 1" class="image_wrapper image_fl" />

                        <div class="cleaner cleaner_h40"></div>
                        <h3>Podras algunas cosas que puedes hacer.</h3>
                        
                        <ul class="tmo_list">
                            <li>Dar de alta a sus empleados.</li>
                            <li>Dar de baja a sus empleados.</li>
                            <li>Consultar el almacen de tu pasteleria.</li>
                            <li>Y muchas cosas mas...</li>    
                        </ul>
                    </div>
					
					<div class="panel" id="alem">
                        <h2>Alta de Empleado</h2>  
						<p>Todos los campos son obligatorios.</p>
                        <div class="cleaner cleaner_h40"></div>
                        
						<div id="contact_form">
                            <form method="POST" name="upser" action="index.php#alem" onsubmit="return valida();">
                                <label>Nombre:</label>
                                <input type="text" id="name" name="name" maxlength="20" class="required input_field" />
                                <div class="cleaner_h10"></div>
								<label>Apellidos:</label>
                                <input type="text" id="lastname" name="lastname" maxlength="20" class="required input_field" />
                                <div class="cleaner_h10"></div>
                                <label>Direccion:</label>
                                <input type="text" id="address" name="address" maxlength="20" class="required input_field" />
                                <div class="cleaner_h10"></div>
								<label>Telefono:</label>
                                <input type="text" id="phone" name="phone" maxlength="10" class="required input_field" onkeypress="return permite(event, 'num')" />
                                <div class="cleaner_h10"></div>
								<label style="width: auto;">Tipo de usuario:</label>
								<select name="typeuser" id="typeuser" class="required input_field">
                                  <option value="0">-- Seleccione uno --</option>
                                  <option value="admin">Gerente</option>
								  <option value="mostr">Mostrador</option>
								  <option value="alma">Almacen</option>
                                </select>
								<div class="cleaner_h10"></div>
                                <div class="cleaner_h10"></div>
                                <p style="color:#F00;"><?php echo $adduser; ?></p>
                                <div class="cleaner_h10"></div>
                                <input type="submit" class="submit_btn float_l" name="enviar" id="enviar" value="Aceptar" />
                            </form>
                        </div>
                    </div>
					
					<div class="panel" id="baem">
                        <h2>Baja de Empleado</h2>  
						<p>Todos los campos son obligatorios.</p>
                        <div class="cleaner cleaner_h40"></div>
                        
						<div id="contact_form">
                            <form method="POST" name="douser" action="index.php#baem" onsubmit="return valida1();">
                                <label>Id de empleado:</label>
                                <input type="text" id="iduser" name="iduser" class="required input_field"  onkeypress="return permite(event, 'num')" maxlength="5" />
                                <div class="cleaner_h10"></div>
								<label>Concepto:</label>
                                <textarea id="concept" name="concept" rows="1" cols="1" class="required input_field" maxlength="150" ></textarea>
                                <div class="cleaner_h10"></div>
                                <div class="cleaner_h10"></div>
                                <p style="color:#F00;"><?php echo $downuser; ?></p>
                                <div id="contador">  </div>
                                <div class="cleaner_h10"></div>
                                <input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Aceptar" />
                            </form>
                            
                        </div>
                    </div>
					
					<div class="panel" id="alprov">
                        <h2>Alta de Proveedor</h2>  
						<p>Todos los campos son obligatorios.</p>
                        <div class="cleaner cleaner_h40"></div>
                        
						<div id="contact_form">
                            <form method="POST" name="upprov" action="index.php#alprov" onsubmit="return valida2();">
                                <label style="width: auto;">Nombre del Proveedor:</label>
                                <input type="text" id="nameprov" name="nameprov" maxlength="50" class="required input_field" />
                                <div class="cleaner_h10"></div>
								<label>RFC:</label>
                                <input type="text" id="rfc" name="rfc" maxlength="20" class="required input_field" />
                                <div class="cleaner_h10"></div>
                                <label>Direccion:</label>
                                <input type="text" id="addressprov" name="addressprov" maxlength="20" class="required input_field" />
                                <div class="cleaner_h10"></div>
								<label>Teléfono:</label>
                                <input type="text" id="phoneprov" name="phoneprov" maxlength="10" class="required input_field" onkeypress="return permite(event, 'num')" />
                                <div class="cleaner_h10"></div>
                                <div class="cleaner_h10"></div>
                                <p style="color:#F00;"><?php echo $upprov; ?></p>
                                <input type="submit" class="submit_btn float_l" name="enviar" id="enviar" value="Aceptar" />
                            </form>                            
                        </div>
                    </div>
					
					<div class="panel" id="viewempl">
                        <h2>Empleados</h2>  
						<p>Vista general de empleados.</p>
                        
                        <div class="cleaner cleaner_h10"></div>
                        
						<div class="tablemode" >
						
							<?php
								$query_employee = "SELECT Id_Empleado, Nombre, Apellidos, Telefono FROM Empleados";
								$stid = oci_parse($conn, $query_employee);
								$r = oci_execute($stid);
							?>
							
							<table >
								<tr>
									<td>Id</td>
									<td>Nombre</td>
									<td>Apellidos</td>
									<td>Telefono</td>
								</tr>

								
								<?php
									while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
										echo '<tr>';
										foreach ($row as $item) {
											echo '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '').'</td>';
										}
										echo '</tr>';
									}
								?>

							</table>
						</div>
					</div>
                    
					<div class="panel" id="stack">
                        <h2>Almacen</h2>  
						<p>Vista general del almacen.</p>
                        
                        <div class="cleaner cleaner_h10"></div>
                        
						<div class="tablemode" >
						
							<?php
								$query_stack = "SELECT Nombre, Cantidad, Unidad FROM Materia_Prima";
								$stid = oci_parse($conn, $query_stack);
								$r = oci_execute($stid);
							?>
							
							<table >
								<tr>
									<td>Nombre</td>
									<td>Cantidad</td>
									<td>Unidad</td>
								</tr>

								
								<?php
									while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
										echo '<tr>';
										foreach ($row as $item) {
											echo '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '').'</td>';
										}
										echo '</tr>';
									}
								?>

							</table>
						</div>
					</div>
					
					<div class="panel" id="proveedor">
                        <h2>Proveedores</h2>  
						<p>Vista de los proveedores.</p>
                        
                        <div class="cleaner cleaner_h10"></div>
                        
					<div class="tablemode" >
						
							<?php
								$query_proveedor = "SELECT Nombre, RFC, Telefono FROM Proveedor";
								$stid = oci_parse($conn, $query_proveedor);
								$r = oci_execute($stid);
							?>
							
							<table >
								<tr>
									<td>Nombre</td>
									<td>RFC</td>
									<td>Telefono</td>
								</tr>

								
								<?php
									while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
										echo '<tr>';
										foreach ($row as $item) {
											echo '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '').'</td>';
										}
										echo '</tr>';
									}
									oci_close($conn);
								?>

							</table>
						</div>
                    </div>
					
					<div class="panel" id="profile">
                        <h2>Perfil de usuario</h2>
						<p>Te recomendamos cambiar la contraseña que se te dio por defecto.</p>	
                        <div class="cleaner cleaner_h10"></div>
                        
                        <div id="contact_form">
                            <form method="POST" name="updatepass" action="index.php#profile" onsubmit="return valida3();">
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
                                <input type="submit" class="submit_btn float_l" name="sell" id="sell" value="Aceptar" />
                                
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