<?php
//----------------------------------------------------------------------
//                          Εισαγωγή Παραγγελίας
//----------------------------------------------------------------------
$_POST['c']=trim($_POST['c']); 
 
$db = new mysqli('localhost','OTEADMIN','123456','oteshop');

$sql = 'INSERT INTO  orders (order_id,date,company,model,number,price,first_name,family_name,address,tk,town,telephone,creditcard)
  		VALUES ("'.$_POST['order_id'].'",
				now(),     
		        "'.$_POST['company'].'",
    	        "'.$_POST['model'].'",
			    "'.$_POST['number'].'",
    	        "'.$_POST['price'].'",
				
				"'.$_POST['a'].'",
				"'.$_POST['b'].'",
				"'.$_POST['c'].'",
				"'.$_POST['d'].'",
				"'.$_POST['e'].'",
				"'.$_POST['f'].'",
				"'.$_POST['g'].'")';

$result = $db->query($sql);

if ($result) {
    $created = 'Account created for +++: ';
	$created .= stripslashes($_POST['model']).' '.stripslashes($_POST['number']);
    echo 'duplicate=n&message='.urlencode($created);
	} else{
	echo 'duplicate=y&message='.urlencode('There is a smoll problem...');
}

$db->close();

?>