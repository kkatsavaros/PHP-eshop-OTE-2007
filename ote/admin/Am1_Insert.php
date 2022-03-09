<?php
//----------------------------------------------------------------------
//                          ÁíáíÝùóç ÄåäïìÝíùí 
//---------------------------------------------------------------------- 
/*$_POST['id']='13';
$_POST['a']='a';
$_POST['b']='b';
$_POST['c']='c';
$_POST['d']='d';
$_POST['e']='c://photosoteshop/abc.jpg';
$_POST['f']='f';
$_POST['g']='g';
$_POST['h']='h';
$_POST['i']='2005-01-01';*/

	$db = new mysqli('localhost','OTEADMIN','123456','oteshop');
		
	$sql = 'UPDATE am1 SET am1_title = "'.$_POST['a'].'",
        				   am1_text = "'.$_POST['b'].'"';							    		 
							 
//	$sql .= ' WHERE id = '.$_POST['id'];
	$db->query($sql);    
	$result = $db->query($sql);
	
	if($result){		
		$updated = 'ok Updated ';
		$updated .= stripslashes($_POST['a']).' '.stripslashes($_POST['c']);
		$output = 'duplicate=n&message='.urlencode($updated);
	}else{
		$output='message='.urlencode('problem...');
	}
	echo $output; 
	
	$db->close();	
?>