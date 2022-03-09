<?php
			  // This is the temporary file created by PHP 
              $uploadedfile = $_FILES['uploadfile']['tmp_name'];
              
              // Create an Image from it so we can do the resize<br>
              $src = imagecreatefromjpeg($uploadedfile);
              
              // Capture the original size of the uploaded image<br>
              list($width,$height)=getimagesize($uploadedfile);
             
              // For our purposes, I have resized the image to be<br>
              // 600 pixels wide, and maintain the original aspect <br>
              // ratio. This prevents the image from being &quot;stretched&quot;<br>
              // or &quot;squashed&quot;. If you prefer some max width other than<br>
              // 600, simply change the $newwidth variable<br>
              $newwidth=600;
              $newheight=($height/$width)*600;
              $tmp=imagecreatetruecolor($newwidth,$newheight);
             
              // this line actually does the image resizing, copying from the original
              // image into the $tmp image<br>
              imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 
              
              // now write the resized image to disk. I have assumed that you want the<br>
			  
              // resized, uploaded image file to reside in the ./images subdirectory.<br>
              $filename = "images/". $_FILES['uploadfile']['name'];
			  
              imagejpeg($tmp,$filename,100);
			  
              imagedestroy($src);
              imagedestroy($tmp);
			  
             /*<p class="code">// NOTE: PHP will clean up the temp file it created 
              when the request<br>
              // has completed.<br>
              ?&gt; </p>
            <p>Best of Luck,<br>
              The 4word systems team.</p>*/
?>