<?php
//------------------------------------------------------------------------------------------
//  	Αφού πατηθεί το κουμπί update, βρίσκει αυτό το πρόγραμμα την ζητούμενη εγγραφή
//	         και την πάει στα texts, στο Flash. Δεν χρειάζεται να έχει counter.
//------------------------------------------------------------------------------------------


$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'SELECT * FROM users WHERE id = '.$_POST['id'];
$result = $db->query($sql);		
		  
while ($row = $result->fetch_assoc()) {  
	$details = 'id='.$row['id'];
	$details .= '&a='.urlencode($row['first_name']);
	$details .= '&b='.urlencode($row['family_name']);
	$details .= '&c='.urlencode($row['telephone']);
	$details .= '&d='.urlencode($row['email']);
	$details .= '&e='.urlencode(repair_SQL_DATEONLY($row['birthday']));
	$details .= '&f='.urlencode($row['username']);
}
		  
echo $details;
		 
$db->close();


function repair_SQL_DATEONLY($theString) {
	$arr1=explode(" ", $theString);
	$arrDate=explode("-", $arr1[0]);
	$arrdate2=array_reverse($arrDate);
	$arrDate3=implode("-", $arrdate2);

	return $arrDate3;
}
?>