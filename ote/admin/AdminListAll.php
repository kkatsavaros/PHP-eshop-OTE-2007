<?php
//----------------------------------------------------------------------
//                          Εμφάνιση Δεδομένων
//----------------------------------------------------------------------

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');

$sql='SELECT * FROM users';
$result = $db->query($sql);

$numrows = $result->num_rows;
$userlist = "total=$numrows";    // Η πρώτη μεταβλητή που στέλνουμε.

$counter = 0;

while ($row = $result->fetch_assoc()) {
	$userlist .= '&id'.$counter.'='.$row['id'];
	$userlist .= '&a'.$counter.'='.urlencode(stripslashes($row['first_name']));
	$userlist .= '&b'.$counter.'='.urlencode(stripslashes($row['family_name']));
    $userlist .= '&c'.$counter.'='.urlencode(stripslashes($row['telephone']));
	$userlist .= '&d'.$counter.'='.urlencode(stripslashes($row['email']));
	$userlist .= '&e'.$counter.'='.urlencode(repair_SQL_DATEONLY($row['birthday']));
    $userlist .= '&f'.$counter.'='.urlencode(stripslashes($row['username']));

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