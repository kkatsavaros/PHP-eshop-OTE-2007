<?php
	//$_POST['searchFor']='1176567582750';
	
	//echo $_POST['searchFor'];
		
	$a=$_GET['query'];

	require('fpdf.php');

	$pdf=new FPDF('L','pt','A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(180,20,'Order of',1,0,'C');
	$pdf->Cell(180,20,$a,1,0,'C');
	$pdf->ln(30);
	$pdf->Output();
?>