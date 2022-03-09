<?php
//----------------------------------------------------------------------
//             Ερώτημα από Combo Box - Αριθμός Παραγγελίας
//----------------------------------------------------------------------

	//$_POST['searchFor']='1176567582750';

	$db = new mysqli('localhost','OTEADMIN','123456','oteshop'); 	

	$sql = 'SELECT * FROM orders WHERE order_id= "'.$_POST['searchFor'].'"';      
	$result = $db->query($sql);	        
	
	$numrows = $result->num_rows;	
	$userlist = "total=$numrows";
	
	$counter = 0;
	
	while ($row = $result->fetch_assoc()) {
		$userlist .= '&id'.$counter.'='.urlencode(stripslashes($row['id']));		
		$userlist .= '&order_id'.$counter.'='.urlencode(stripslashes($row['order_id']));		
		$userlist .= '&date'.$counter.'='.urlencode(repair_SQL_DATEONLY($row['date']));		
		
		$userlist .= '&a'.$counter.'='.urlencode(stripslashes($row['company']));
		$userlist .= '&b'.$counter.'='.urlencode(stripslashes($row['model']));
   		$userlist .= '&c'.$counter.'='.urlencode(stripslashes($row['number']));
		$userlist .= '&d'.$counter.'='.urlencode(stripslashes($row['price']));
		//-----
		$userlist .= '&e'.$counter.'='.urlencode(stripslashes($row['first_name']));
		$userlist .= '&f'.$counter.'='.urlencode(stripslashes($row['family_name']));
		$userlist .= '&g'.$counter.'='.urlencode(stripslashes($row['address']));
		$userlist .= '&h'.$counter.'='.urlencode(stripslashes($row['tk']));
		$userlist .= '&i'.$counter.'='.urlencode(stripslashes($row['town']));
		$userlist .= '&j'.$counter.'='.urlencode(stripslashes($row['telephone']));
		$userlist .= '&k'.$counter.'='.urlencode(stripslashes($row['creditcard']));		
		
		$counter++;
	}
	
	echo $userlist;
	
    $db->close();
	
function repair_SQL_DATEONLY($theString) {
	$arr1=explode(" ", $theString);
	$arrDate=explode("-", $arr1[0]);
	$arrdate2=array_reverse($arrDate);
	$arrDate3=implode("-", $arrdate2);

	return $arrDate3;
}
?>