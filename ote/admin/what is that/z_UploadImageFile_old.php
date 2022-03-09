<?php



  if ($_FILES['userfile']['error'] > 0)
  {
    echo 'Problem: ';
    switch ($_FILES['userfile']['error'])                           //number=Ο κωδικός λάθους που σχετίζεται με την αποστoλή του αρχείου0,1,2,3,4.
    {                                                               //       0=Δεν έγινε κανένα λάθος κατά το ανέβασμα.
      case 1:  echo 'File exceeded upload_max_filesize';  break;    //diladi: Αρχείο μεγαλύτερο από php.ini idiotita:upload_max_filesize.
      case 2:  echo 'File exceeded max_file_size';  break;          //diladi: Αρχείο μεγαλύτερο από HTML forma: MAX_FILE_SIZE.
      case 3:  echo 'File only partially uploaded';  break;         //diladi: Το αρχείο στάλθηκε εν μέρη όχο όμως όλο.
      case 4:  echo 'No file uploaded';  break;                     //diladi: Δεν στάλθηκε κανένα αρχείο.
    }
    exit;
  }

  // Does the file have the right MIME type?
  /*if ($_FILES['userfile']['type'] != 'image/jpg')                  // Ο τύπος του αρχείου που θέλουμε να ανεβάσουμε.
  {
    //echo 'Problem: file is not image gif';
	header("location:SendImagetoServer.php?not_jpg=1"); 
    exit;
  }*/
  
   // put the file where we'd like it
  $upfile = 'C:/photosoteshop/'.$_FILES['userfile']['name'];            //=to onoma tou arxeiou pou theloume na anebasoume p.x.->text1.txt  .

  if (is_uploaded_file($_FILES['userfile']['tmp_name']))          //=to meros opou to arxeio exei apothikeutei prosorina ston web server(apache).
  {
     if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile))
     {
        //echo 'Problem: Could not move file to destination directory';		
		header("location:SendImagetoServer.php?not_upload=1"); 
        exit;
     }
  } 
  else 
  {
    //echo 'Problem: Possible file upload attack. Filename: ';
	header("location:SendImagetoServer.php?else=1"); 
    //echo $_FILES['userfile']['name'];
    exit;
  }
  
  //echo "<h1>"."File uploaded successfully"."</h1>"."<br><br>"; 
  header("location:SendImagetoServer.php?ok=1"); 
  // reformat the file contents
  /*$fp = fopen($upfile, 'r');
  $contents = fread ($fp, filesize ($upfile));
  fclose ($fp);*/
 
 
	 
 
 
 
 
 
 
  /*$contents = strip_tags($contents);
  $fp = fopen($upfile, 'w');
  fwrite($fp, $contents);
  fclose($fp);*/
	
  // show what was uploaded
  /*echo 'Preview of uploaded file contents:<br><hr>';
  echo ".<i>".$contents."</i>";
  echo '<br><hr>';*/
  
  //header("location:02.Login.php?uploadok=1");

?>