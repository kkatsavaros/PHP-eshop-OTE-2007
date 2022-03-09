<?php
//----------------------------------------------------------------------
//                    Ερώτημα από Combo Box "ΟΛΑ"
//----------------------------------------------------------------------

$db = new mysqli('localhost','OTEADMIN','123456','oteshop'); 
	
if ($_POST['moneytext']==0){
		if($_POST['a']=="" AND $_POST['b']!==""){  
			$sql = 'SELECT * FROM products WHERE company="'.$_POST['b'].'" ';
		}               
		
		if($_POST['a']!=="" AND $_POST['b']==""){  	
			$sql = 'SELECT * FROM products WHERE category="'.$_POST['a'].'" ';
		}	
		
		if($_POST['a']!=="" AND $_POST['b']!==""){  	
			$sql = 'SELECT * FROM products WHERE category="'.$_POST['a'].'" AND company="'.$_POST['b'].'" ';
		}	
	
}else{

		if($_POST['a']=="" AND $_POST['b']!==""){  
			$sql = 'SELECT * FROM products WHERE company="'.$_POST['b'].'" AND price<='.$_POST['moneytext'].'  ';
		}               
		
		if($_POST['a']!=="" AND $_POST['b']==""){  	
			$sql = 'SELECT * FROM products WHERE category="'.$_POST['a'].'" AND price<='.$_POST['moneytext'].'  ';
		}	
		
		if($_POST['a']!=="" AND $_POST['b']!==""){  	
			$sql = 'SELECT * FROM products WHERE category="'.$_POST['a'].'" AND company="'.$_POST['b'].'" AND price<='.$_POST['moneytext'].' ';
		}	
}



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