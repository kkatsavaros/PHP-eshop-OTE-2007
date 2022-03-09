<?php
//----------------------------------------------------------------------
//                          Εύρεση Δεδομένων - 4
//----------------------------------------------------------------------  
//elseif ($_POST['action'] == 'find') {
 
 
//$_POST['a']='κω';
//$_POST['b']='';
 
 // $input['first_name'] = trim($_POST['a']);             // remove any leading or trailing blank spaces from input
  //$input['family_surname'] = trim($_POST['b']);

  $searchParams = array();                           // create an array of search parameters for use in SQL query
  $i = 0;  
  
  /*foreach ($input as $key => $value) {
    if (strlen($value) > 0) {
      $searchParams[$i] = $key.'LIKE "%'.$value.'%"';    // $searchParams[0]=name LIKE "%Kos%"
      $i++;                                               // $searchParams[1]=surname LIKE "%Katsav%"
      }
  }*/
  
  
  $sql='SELECT * FROM users WHERE first_name LIKE '%.$_POST['a'].%'';
  
//  $sql = 'SELECT * FROM users WHERE username = "' . $_POST['f'] . '"';  <---< ΑΠΌ ΑΛΛΟΥ
  
  // create SQL query and concatenate with parameters and sort order
//  $sql = 'SELECT * FROM users WHERE '.join($searchParams,' AND '); // SELECT * FROM telephones WHERE name LIKE "%Kos%" AND surname LIKE "%Katsav%".
  // query database and send results back
  echo getUserList($sql);
//  }
  
//***********************************************************************
//                          Συναρτήσεις
//************************************************************************
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