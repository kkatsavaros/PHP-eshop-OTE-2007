<?php
	$_POST['searchFor']='1176567582750';

	require('fpdf.php');

	$pdf=new FPDF('L','pt','A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(180,20,'Order of',1,0,'C');
	$pdf->Cell(180,20,$_POST['searchFor'],1,0,'C');
	$pdf->ln(30);

	$db = new mysqli('localhost','OTEADMIN','123456','oteshop'); 	

	$sql = 'SELECT * FROM orders WHERE order_id= "'.$_POST['searchFor'].'" LIMIT 1';      
	$result = $db->query($sql);	        
	
	$numrows = $result->num_rows;	
	
	$userlist = $numrows;
	$pdf->Cell(200,20,$userlist,1,0,'C');
	$pdf->ln(30);
	
	$counter = 0;
	
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
	
	
	//$db = new mysqli('localhost','OTEADMIN','123456','oteshop'); 	

	$sql = 'SELECT * FROM orders WHERE order_id= "'.$_POST['searchFor'].'" LIMIT 1';      
	$result = $db->getRow($sql);	        
	
	$numrows = $result->num_rows;	
	$userlist2 = $numrows;
	
	while ($row = $result->fetch_assoc()) {
		/*$userlist .= '&id'.$counter.'='.urlencode(stripslashes($row['id']));		
		$userlist .= '&order_id'.$counter.'='.urlencode(stripslashes($row['order_id']));		
		$userlist .= '&date'.$counter.'='.urlencode(repair_SQL_DATEONLY($row['date']));		*/
				
		$userlist2 = stripslashes($row['first_name']);
		$pdf->Cell(200,20,$userlist2,1,0,'C'); 
		
		$userlist2 = stripslashes($row['model']);
		$pdf->Cell(200,20,$userlist2,1,0,'C'); 
		
   		$userlist2 =stripslashes($row['number']);
		$pdf->Cell(200,20,$userlist2,1,0,'C'); 
		
		$userlist2 =stripslashes($row['price']);
		$pdf->Cell(200,20,$userlist2,1,0,'C'); 

		$pdf->ln(30);
		
		//-----
		//$counter++;
		}
	
	
	
	
	//echo $userlist;
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