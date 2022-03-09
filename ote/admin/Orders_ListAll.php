<?php
//----------------------------------------------------------------------
//                         Εμφάνιση Δεδομένων
//                    Εμφάνιση όλων των παραγγελιών
//----------------------------------------------------------------------

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');

$sql='SELECT * FROM orders ORDER BY id DESC';
$result = $db->query($sql);

$numrows = $result->num_rows;
$userlist = "total=$numrows";    // Η πρώτη μεταβλητή που στέλνουμε.

$counter = 0;

while ($row = $result->fetch_assoc()) {

	$userlist .= '&date'.$counter.'='.urlencode(repair_SQL_DATEONLY($row['date']));
	$userlist .= '&a'.$counter.'='.urlencode(stripslashes($row['company']));
	$userlist .= '&b'.$counter.'='.urlencode(stripslashes($row['model']));
    $userlist .= '&c'.$counter.'='.urlencode(stripslashes($row['number']));
	$userlist .= '&d'.$counter.'='.urlencode(stripslashes($row['price']));
	//-----
	$userlist .= '&e'.$counter.'='.urlencode(stripslashes($row['first_name']));
	$userlist .= '&f'.$counter.'='.urlencode(stripslashes($row['family_name']));
	$userlist .= '&g'.$counter.'='.urlencode(stripslashes($row['telephone']));
	$userlist .= '&h'.$counter.'='.urlencode(stripslashes($row['creditcard']));
	
	$userlist .= '&j'.$counter.'='.urlencode(stripslashes($row['order_id']));	
	
//	$userlist .= '&e'.$counter.'='.urlencode(repair_SQL_DATEONLY($row['birthday']));

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