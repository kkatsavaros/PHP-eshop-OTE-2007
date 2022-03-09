<?php

/*$output='';
foreach($_POST as $key=>$value){
	$output .="&$key=".urlencode($value);
}
echo $output;	*/


	$db = new mysqli('localhost','OTEADMIN','123456','oteshop'); 
	
//	$sql = 'SELECT * FROM products WHERE company LIKE "%'.trim($_POST['searchFor']).'%"';           

	$sql = 'SELECT * FROM products WHERE company="'.$_POST['searchFor'].'"';       //    <--

//	$sql = 'SELECT * FROM products WHERE company="Nokia"';           

// WHERE username = "'.$_POST['username'].'" AND pwd = "'.sha1($_POST['pwd']).'"'
// AND pwd = "'.$_POST['pwd'].'"';
	$result = $db->query($sql);	        
	
	$numrows = $result->num_rows;
	
	$userlist = "total=$numrows";
	
	$counter = 0;
	
	while ($row = $result->fetch_assoc()) {
		
		$userlist .= '&id'.$counter.'='.$row['id'];
		$userlist .= '&b'.$counter.'='.$row['company'];
		$userlist .= '&c'.$counter.'='.$row['model'];
		$userlist .= '&d'.$counter.'='.$row['number'];
		$userlist .= '&e'.$counter.'='.$row['picture'];	
		$userlist .= '&f'.$counter.'='.$row['characteristics'];	
		$userlist .= '&g'.$counter.'='.$row['price'];	
		
		$counter++;
	}
	
	echo $userlist;
	
    $db->close();
?>