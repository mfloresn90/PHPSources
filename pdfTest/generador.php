<?php
	require('fpdf/fpdf.php');

	class PDF extends FPDF	{
	
		function Header() {
			$this->Image('logo_pb.jpg', 10, 8, 33);
			$this->SetFont('Arial', 'B', 14);
			$this->Cell(80);
			$this->Cell(30, 5, 'Pc Health Cake Factory Enterprises S.A. de C.V.', 0, 0, 'C');
			$this->Ln(10);
		}
		
		function Footer() {
			$this->SetY(-15);
			$this->SetFont('Arial', 'I', 8);
			$this->Cell(0, 10, 'Página '.$this->PageNo().'/{nb}', 0, 0, 'C');
		}
	}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(190, 4, 'RFC: PCHCF-01102008', 0, 0, 'R');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(190, 4, '--------------------------------------------------------------------------------------------------------------------', 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(190, 4, 'Año de Júarez 289, Col. Granjas San Antonio, Deleg. Iztapalapa, México D.F.', 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(190, 4, '--------------------------------------------------------------------------------------------------------------------', 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(190, 4, 'Reforma #222 Torre 1 Piso 3, Col. Júarez, Sucursal 11721, Centro Médico.', 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(190, 4, '--------------------------------------------------------------------------------------------------------------------', 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(190, 4, 'MOSTRADOR', 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(190, 4, '--------------------------------------------------------------------------------------------------------------------', 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(190, 4, "Nombre: ".$_POST['nombre'], 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(190, 4, "Direccion: ".$_POST['direccion'], 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(190, 4, "Teléfono: ".$_POST['tel'], 0, 0, 'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(190, 4, "TOTAL: $".$_POST['tel'], 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(190, 4, '--------------------------------------------------------------------------------------------------------------------', 0, 0, 'C');
$pdf->Ln();
$pdf->Output("fact.pdf",'I');
echo "<script language='javascript'>window.open('fact.pdf','_blank','');</script>";
?>