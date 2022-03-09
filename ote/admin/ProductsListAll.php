<?php
//----------------------------------------------------------------------
//                          Εμφάνιση Δεδομένων
//----------------------------------------------------------------------

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');

$sql='SELECT * FROM products ORDER BY id DESC';
$result = $db->query($sql);

$numrows = $result->num_rows;
$userlist = "total=$numrows";    // Η πρώτη μεταβλητή που στέλνουμε.

$counter = 0;

while ($row = $result->fetch_assoc()) {

	$userlist .= '&id'.$counter.'='.$row['id'];
	$userlist .= '&a'.$counter.'='.$row['category'];
	$userlist .= '&b'.$counter.'='.urlencode(stripslashes($row['company']));
    $userlist .= '&c'.$counter.'='.urlencode(stripslashes($row['model']));
	$userlist .= '&d'.$counter.'='.urlencode(stripslashes($row['number']));	
    $userlist .= '&e'.$counter.'='.urlencode(stripslashes($row['picture']));
    $userlist .= '&f'.$counter.'='.urlencode(stripslashes($row['characteristics']));
    $userlist .= '&g'.$counter.'='.urlencode(stripslashes($row['price']));
    $userlist .= '&h'.$counter.'='.urlencode(stripslashes($row['offer']));
	$userlist .= '&i'.$counter.'='.urlencode(repair_SQL_DATEONLY($row['date']));

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