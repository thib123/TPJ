<?php
$dir = opendir("images")

if(file_exists("images"))

{
//echo "le dossier existe";
  while(($file = readdir($dir)) !== false)
      
  {
      if($file !== "." && $file !== "..")
      
      {echo "<img width='100' src='images/". $file ."'>br/>";
      }
  }
}

else
{
    echo "le dossier n'existe pas";
}
// miniatures

//variables 

$chemin_originaux = "images/originaux";
$chemin_miniatures= "images/miniatures";

//copier l'original

$source = imagecreatefromjpeg($chemin_originaux . $filename)
$width_source = imagex($source); 
$height_source = imagey($source); 

    // créer une nouvelle image

    $width_thumb = 200;
    $height_thumb = 200;

$miniature = imagecreatetruecolor($width_thumb, $height_thumb)
 
imagecopyrezized($miniature, $source, 0, 0, 0, 0, $width_thumb; $height_thumb, $width_source, $height_source);

if(!file_exist($chemin_miniature))
{
    die("problème");
}
imagejpeg($miniature, $chemin_miniature . $filename);
$img_miniatures = "<img src='". $chemin_miniature . $filename ."'>";
echo $img_miniatures;
?>