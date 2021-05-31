<?php
	function resize_image($file,$new, $w, $h,$imageFileType){
    list($width, $height) = getimagesize($file);
    switch ($imageFileType){
               case 'jpg': 
                   $src = imagecreatefromjpeg($file); 
                   break;
                    
               case 'png': 
                   $src = imagecreatefrompng($file); 
                   break;
               
               case 'gif': 
                   $src = imagecreatefromgif($file); 
                   break;
      }
    
    $dst = imagecreatetruecolor($w,$h);
    
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
    
    if($imageFileType == "jpg"){
         $image_created = imagejpeg($dst,$new,80);
       }
    if($imageFileType == "png"){
         $image_created = imagepng($dst,$new,80);
        }
    if($imageFileType == "gif"){
          $image_created = imagegif($dst,$new,80);
       }
       
    return $image_created;
}
?>