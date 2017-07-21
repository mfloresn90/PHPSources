<?php
	
	include ("../config/config.php");
	ob_start();
	session_start();
	
	$product = $_POST['product'];
	$cantidad = $_POST['cantidad'];
	$cantent = $_POST['cantent'];
	$idempleado = $_SESSION['idemployee'];
	$fecha = date("j/n/Y g:i:s");
	$stid = oci_parse($conn, "SELECT Precio FROM Productos WHERE Nombre = '$product'");
	$r = oci_execute($stid);
	$fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
	$price_unit = array_shift($fila);
	$price = $cantidad * $price_unit;
			
	$query_venta = "INSERT INTO Facturas(Id_Factura, Id_Empleado, Producto, Monto_Total, Fecha)
	VALUES (factura_sequence.nextval, '".$idempleado."', '".$product."', '".$price."', '".$fecha."')";
	$stmt = oci_parse($conn, $query_venta);
	$rc=oci_execute($stmt);
	oci_commit($conn);
	oci_free_statement($stmt);
	
	$stid = oci_parse($conn, "SELECT Id_Factura FROM Facturas WHERE Fecha = '$fecha'");
	$r = oci_execute($stid);
	$fila = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
	$folio = array_shift($fila);
	
	require('fpdf/fpdf.php');

	class PDF extends FPDF	{

		function Header() {
			$this->Image('../images/logo_pb.jpg', 10, 8, 40);
			$this->SetFont('Arial', 'B', 18);
			$this->Cell(80);
			$this->Cell(110, 4, 'Pc Health Cake Factory Enterprises S.A. de C.V.', 0, 0, 'R');
			$this->Ln(10);
		}
		
		function Footer() {
			$this->SetY(-15);
			$this->SetFont('Arial', 'I', 10);
			$this->Cell(0, 10, 'Página '.$this->PageNo().'/{nb}', 0, 0, 'C');
		}
	}

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 18);
	$pdf->Cell(190, 4, 'RFC: PCHCF-01102008', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, 'Folio: '.$folio, 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 10, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, '--------------------------------------------------------------------------------------', 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, 'Año de Júarez 289, Col. Granjas San Antonio,', 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, 'Delegación Iztapalapa, México D.F.', 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, '--------------------------------------------------------------------------------------', 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, 'MOSTRADOR', 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, '--------------------------------------------------------------------------------------', 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(10, 6, "", 0, 0, 'C');
	$pdf->Cell(30, 6, "Cantidad", 1, 0, 'C');
	$pdf->Cell(50, 6, "Producto", 1, 0, 'C');
	$pdf->Cell(40, 6, "Precio", 1, 0, 'C');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(10, 6, "", 0, 0, 'C');
	$pdf->Cell(25, 6, $_POST['cantidad'], 0, 0, 'C');
	$pdf->Cell(50, 6, $_POST['product'], 0, 0, 'C');
	$pdf->Cell(40, 6, $price_unit, 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(95, 6, "", 0, 0, 'R');
	$pdf->Cell(20, 6, "----------------", 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(95, 6, "TOTAL: ", 0, 0, 'R');
	$pdf->Cell(20, 6, $price, 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(95, 6, "Cantidad Entregada: ", 0, 0, 'R');
	$pdf->Cell(20, 6, "$".$_POST['cantent'], 0, 0, 'C');
	$pdf->Ln();
	if ($_POST['cantent'] < $price){
		$precio =  $price - $_POST['cantent'];
		$pdf->Cell(95, 6, "Faltan: ", 0, 0, 'R');
		$pdf->Cell(20, 6, "$".$precio, 0, 0, 'C');
	}
	else if ($price < $_POST['cantent']){
		$precio = $_POST['cantent'] - $price;
		$pdf->Cell(95, 6, "Cambio: ", 0, 0, 'R');
		$pdf->Cell(20, 6, "$".$precio, 0, 0, 'C');
	}
	else if ($_POST['cantent'] == $price){
		$precio = $_POST['cantent'] - $price;
		$pdf->Cell(95, 6, "Cambio: ", 0, 0, 'R');
		$pdf->Cell(20, 6, "$".$precio, 0, 0, 'C');
	}
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(190, 4, '--------------------------------------------------------------------------------------', 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, 'Lugar de Expedición.', 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, 'Reforma #222 Torre 1 Piso 3, Col. Júarez,', 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, 'Sucursal 11721, Centro Médico.', 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, 'Fecha y Hora: '.$fecha, 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, '--------------------------------------------------------------------------------------', 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, 'MUCHAS GRACIAS POR SU COMPRA', 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(190, 5, '', 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(190, 4, 'PAGO EN UNA SOLA EXHIBICION', 0, 0, 'C');
	$pdf->Ln();
	$pdf->Output("fact.pdf",'I');
	echo "<script language='javascript'> window.open('fact.pdf', '_blank'); </script>";
?>