<?php
//--------------------------------------------------------------------------------------------
//     Αφού πατηθεί το κουμπί update, βρίσκει αυτό το πρόγραμμα την ζητούμενη εγγραφή
//           και την πάει στα texts, στο Flash. Δεν χρειάζεται να έχει counter.
//--------------------------------------------------------------------------------------------

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
$sql = 'SELECT * FROM products WHERE id = '.$_POST['id'];
$result = $db->query($sql);		
		  
while ($row = $result->fetch_assoc()) {  
	$userlist = '&id='.$row['id'];
	$userlist .= '&a='.$row['category'];
	$userlist .= '&b='.urlencode(stripslashes($row['company']));
    $userlist .= '&c='.urlencode(stripslashes($row['model']));
	$userlist .= '&d='.urlencode(stripslashes($row['number']));	
    $userlist .= '&e='.urlencode(stripslashes(basename($row['picture'])));
    $userlist .= '&f='.urlencode(stripslashes($row['characteristics']));
    $userlist .= '&g='.urlencode(stripslashes($row['price']));
    $userlist .= '&h='.urlencode(stripslashes($row['offer']));
	$userlist .= '&i='.urlencode(repair_SQL_DATEONLY($row['date']));
	
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