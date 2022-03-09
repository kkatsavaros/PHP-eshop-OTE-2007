<?php
//----------------------------------------------------------------------
//                          Εύρεση Δεδομένων - 4
//----------------------------------------------------------------------  
  
$sql='SELECT * FROM users WHERE first_name LIKE "%'.$_POST['a'].'%" AND family_name LIKE "%'.$_POST['b'].'%"';
  
echo getUserList($sql);
  
//***********************************************************************
//                          Συναρτήσεις
//***********************************************************************
function getUserList($sql) {
		$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		$result = $db->query($sql);
	  
		$numrows = $result->num_rows;
		$userlist = "total=$numrows";
	  
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
	  
	  $db->close();
	  return $userlist;
}

function repair_SQL_DATEONLY($theString) {
		$arr1=explode(" ", $theString);
		$arrDate=explode("-", $arr1[0]);
		$arrdate2=array_reverse($arrDate);
		$arrDate3=implode("-", $arrdate2);
	
		return $arrDate3;
}
?>