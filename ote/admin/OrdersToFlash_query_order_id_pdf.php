<?php
//-----------------------------------------------------------------------------
//       Δημιουργία pdf αρχείου - Προσοχή χρησιμοπoιείται η μέθοδος GET
//
//               Ερώτημα από Combo Box - Αριθμός Παραγγελίας
//-----------------------------------------------------------------------------
	//$_GET['query']='1176567582750';

	define('FPDF_FONTPATH','C:/AppServ/www/ote/admin/font/');
	require('fpdf.php');

	$pdf=new FPDF('L','pt','A4');	
	$pdf->AddFont('Calligrapher','','verdana.php');	
		
	$pdf->AddPage();
	$pdf->SetDisplayMode('fullpage');
	$pdf->SetFont('Calligrapher','',16);
	//$pdf->SetFont('Arial','B',16);
	
	$pdf->SetDrawColor(0,0,255);       // Τι χρώμα θα έχει το περίγραμμα.
	$pdf->SetFillColor(255,255,153);   // Ti γέμισμα θα έχει.
	
	$pdf->SetTextColor(0,0,255);
	$pdf->Cell(180,20,'Order of',1,0,'C',1);	
	$pdf->Cell(180,20,$_GET['query'],1,0,'C',1);
	$pdf->ln(30);
	
	
	// -----------------------------------------
	//                  Ερώτημα 1
	// -----------------------------------------
	
	$db = new mysqli('localhost','OTEADMIN','123456','oteshop'); 	

	$sql = 'SELECT * FROM orders WHERE order_id= "'.$_GET['query'].'" LIMIT 1';      
	$result = $db->query($sql);	        
	
	$numrows = $result->num_rows;	
	$userlist2 = $numrows;
	
	while ($row = $result->fetch_assoc()) {
		
		$userlist2 = " First Name: ".stripslashes($row['first_name']);
		$pdf->SetTextColor(0,0,255);
		$pdf->Cell(400,20,$userlist2,1,0,'L'); 
		$pdf->ln(30);
		
		$userlist2 ="Family Name: ".stripslashes($row['family_name']);
		$pdf->SetTextColor(0,0,255);
		$pdf->Cell(400,20,$userlist2,1,0,'L'); 
		$pdf->ln(30);
		
   		$userlist2 ="Address: ".stripslashes($row['address']);
		$pdf->SetTextColor(0,0,255);
		$pdf->Cell(400,20,$userlist2,1,0,'L'); 
		$pdf->ln(30);
		
		$userlist2 ="T.K.: ".stripslashes($row['tk']);
		$pdf->SetTextColor(0,0,255);
		$pdf->Cell(400,20,$userlist2,1,0,'L'); 
		$pdf->ln(30);
		
		$userlist2 ="Telephone: ".stripslashes($row['telephone']);
		$pdf->SetTextColor(0,0,255);
		$pdf->Cell(400,20,$userlist2,1,0,'L'); 
		$pdf->ln(30);
		
		$userlist2 ="Credit Card: ".stripslashes($row['creditcard']);
		$pdf->SetTextColor(0,0,255);
		$pdf->Cell(400,20,$userlist2,1,0,'L'); 
		$pdf->ln(30);
		
		//-----
		//$counter++;
		}
	
	//echo $userlist;
	$db->close();
	
	$pdf->ln(30);

	// -----------------------------------------
	//                  Ερώτημα 2
	// -----------------------------------------

	$db = new mysqli('localhost','OTEADMIN','123456','oteshop'); 	

	$sql = 'SELECT * FROM orders WHERE order_id= "'.$_GET['query'].'"';      
	$result = $db->query($sql);	        
	
	$numrows = $result->num_rows;	
	
	$userlist = "Total Products: ".$numrows;
	$pdf->Cell(200,20,$userlist,1,0,'L',1);
	$pdf->ln(30);
	
	$pdf->SetTextColor(0,0,255);
	$pdf->Cell(200,20,'Company',1,0,'C',1);
	$pdf->Cell(380,20,'Model',1,0,'C',1);
	$pdf->Cell(120,20,'Number',1,0,'C',1);
	$pdf->Cell(100,20,'Price',1,0,'C',1);
	
	$pdf->ln(25);
	while ($row = $result->fetch_assoc()) {
		
		$pdf->SetTextColor(255,0,0);
		$userlist = stripslashes($row['company']);
		$pdf->Cell(200,20,$userlist,1,0,'C'); 
		
		$pdf->SetTextColor(255,0,0);
		$userlist = stripslashes($row['model']);
		$pdf->Cell(380,20,$userlist,1,0,'C'); 
		
		$pdf->SetTextColor(255,0,0);
   		$userlist =stripslashes($row['number']);
		$pdf->Cell(120,20,$userlist,1,0,'C'); 
		
		$pdf->SetTextColor(255,0,0);
		$userlist =stripslashes($row['price']);
		$pdf->Cell(100,20,$userlist,1,0,'C'); 

		$pdf->ln(20);		
		
	}	
		
	$db->close();	
    
	$pdf->Output();
	
function repair_SQL_DATEONLY($theString) {
	$arr1=explode(" ", $theString);
	$arrDate=explode("-", $arr1[0]);
	$arrdate2=array_reverse($arrDate);
	$arrDate3=implode("-", $arrdate2);

	return $arrDate3;
}
?>