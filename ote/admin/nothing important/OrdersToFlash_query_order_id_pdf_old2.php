<?php
	//$_POST['searchFor']='1176567582750';
	
	//echo $_POST['searchFor'];
	
	require('fpdf.php');

	$pdf=new FPDF('L','pt','A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(180,20,'Order of',1,0,'C');
	$pdf->Cell(180,20,$_POST['searchFor'],1,0,'C');
	$pdf->ln(30);
	
	
	// 1111111111111111111111111111111111111111111111
	$db = new mysqli('localhost','OTEADMIN','123456','oteshop'); 	

	$sql = 'SELECT * FROM orders WHERE order_id= "'.$_POST['searchFor'].'" LIMIT 1';      
	$result = $db->query($sql);	        
	
	$numrows = $result->num_rows;	
	$userlist2 = $numrows;
	
	while ($row = $result->fetch_assoc()) {
		/*$userlist .= '&id'.$counter.'='.urlencode(stripslashes($row['id']));		
		$userlist .= '&order_id'.$counter.'='.urlencode(stripslashes($row['order_id']));		
		$userlist .= '&date'.$counter.'='.urlencode(repair_SQL_DATEONLY($row['date']));		*/
				
		$userlist2 = " First Name: ".stripslashes($row['first_name']);
		$pdf->Cell(200,20,$userlist2,1,0,'L'); 
		$pdf->ln(30);
		
		$userlist2 ="Family Name: ".stripslashes($row['family_name']);
		$pdf->Cell(200,20,$userlist2,1,0,'L'); 
		$pdf->ln(30);
		
   		$userlist2 ="Address: ".stripslashes($row['address']);
		$pdf->Cell(200,20,$userlist2,1,0,'L'); 
		$pdf->ln(30);
		
		$userlist2 ="T.K.: ".stripslashes($row['tk']);
		$pdf->Cell(200,20,$userlist2,1,0,'L'); 
		$pdf->ln(30);
		
		$userlist2 ="Telephone: ".stripslashes($row['telephone']);
		$pdf->Cell(200,20,$userlist2,1,0,'L'); 
		$pdf->ln(30);
		
		$userlist2 ="Credit Card: ".stripslashes($row['creditcard']);
		$pdf->Cell(200,20,$userlist2,1,0,'L'); 
		$pdf->ln(30);
		
		//-----
		//$counter++;
		}
	
	
	
	
	//echo $userlist;
	$db->close();
	
	$pdf->ln(30);

	// 2222222222222222222222222222222222222222222222
	$db = new mysqli('localhost','OTEADMIN','123456','oteshop'); 	

	$sql = 'SELECT * FROM orders WHERE order_id= "'.$_POST['searchFor'].'"';      
	$result = $db->query($sql);	        
	
	$numrows = $result->num_rows;	
	
	$userlist = "Total Orders: ".$numrows;
	$pdf->Cell(200,20,$userlist,1,0,'L');
	$pdf->ln(30);
	
	$pdf->Cell(200,20,'Company',1,0,'C');
	$pdf->Cell(200,20,'Model',1,0,'C');
	$pdf->Cell(200,20,'Number',1,0,'C');
	$pdf->Cell(200,20,'Price',1,0,'C');
	
	$pdf->ln(30);
	while ($row = $result->fetch_assoc()) {
		/*$userlist .= '&id'.$counter.'='.urlencode(stripslashes($row['id']));		
		$userlist .= '&order_id'.$counter.'='.urlencode(stripslashes($row['order_id']));		
		$userlist .= '&date'.$counter.'='.urlencode(repair_SQL_DATEONLY($row['date']));		*/
				
		$userlist = stripslashes($row['company']);
		$pdf->Cell(200,20,$userlist,1,0,'C'); 
		
		$userlist = stripslashes($row['model']);
		$pdf->Cell(200,20,$userlist,1,0,'C'); 
		
   		$userlist =stripslashes($row['number']);
		$pdf->Cell(200,20,$userlist,1,0,'C'); 
		
		$userlist =stripslashes($row['price']);
		$pdf->Cell(200,20,$userlist,1,0,'C'); 

		$pdf->ln(30);
		
		//-----
		//$counter++;
		}
		
		/*$userlist .= '&f'.$counter.'='.urlencode(stripslashes($row['family_name']));
		$userlist .= '&g'.$counter.'='.urlencode(stripslashes($row['address']));
		$userlist .= '&h'.$counter.'='.urlencode(stripslashes($row['tk']));
		$userlist .= '&i'.$counter.'='.urlencode(stripslashes($row['town']));
		$userlist .= '&j'.$counter.'='.urlencode(stripslashes($row['telephone']));
		$userlist .= '&k'.$counter.'='.urlencode(stripslashes($row['creditcard']));		
		
		//$pdf->SetFont('Arial','B',16);
		//$pdf->Cell(200,20,$userlist,1,0,'C'); //x,y,'message'
		//$pdf->ln(30);		*/
		
		
		
	//}
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