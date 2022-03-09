<?php
//----------------------------------------------------------------------
//                          AioUieoc AaaiiYiui
//----------------------------------------------------------------------

$db = new mysqli('localhost','OTEADMIN','123456','oteshop');

$sql='SELECT * FROM am1';
$result = $db->query($sql);

$numrows = $result->num_rows;
$userlist = "total=$numrows";    // C ?n?oc iaoaaeco? ?io ooYeiioia.

$counter = 0;

while ($row = $result->fetch_assoc()) {

	$userlist .= '&a'.$counter.'='.$row['am1_title'];
	$userlist .= '&b'.$counter.'='.$row['am1_text'];
	/*$userlist .= '&c'.$counter.'='.urlencode(stripslashes($row['a21']));
    $userlist .= '&d'.$counter.'='.urlencode(stripslashes($row['a22']));
	$userlist .= '&e'.$counter.'='.urlencode(stripslashes($row['a31']));	
    $userlist .= '&f'.$counter.'='.urlencode(stripslashes($row['a32']));*/

//	$userlist .= '&i'.$counter.'='.urlencode(repair_SQL_DATEONLY($row['date']));

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