<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulaire : Champs les plus utilisés </title>
</head>

<body>


<form name="formulaire" method="get" action="formulaire-avec-champs-dynamiques.php">

  <fieldset>
        <legend>Formulaire type</legend>

  <input type="text" size="50" name="nom"
        value="<?php if(isset($_GET['nom'])) { echo $_GET['nom'];  }
         else { echo 'votre nom'; }?>" required>
       <br/><br/>

  <input type="text" size="50" name="mail" value="<?php if(isset($_GET['mail'])) { echo $_GET['mail'];  }
         else { echo 'votre mail'; }?>" required><br/><br/>



  <select name="niveau" required="">
      <option value="">Quel est votre niveau ?</option>
      <?php if(isset($_GET['niveau']) && $_GET['niveau'] == "1" ) 
      { echo "<option value='1' selected >Développeur débutant</option>"; } 

      else {
          echo "<option value='1'>Développeur débutant</option>"; 
      	}

      	?>
	 
	   <?php if(isset($_GET['niveau']) && $_GET['niveau'] == "2" ) 
      { echo "<option value='2' selected >Développeur avancé</option>"; } 

      else {
          echo "<option value='2'>Développeur avancé</option>"; 
      	}

      	?>


	   <?php if(isset($_GET['niveau']) && $_GET['niveau'] == "3" ) 
      { echo "<option value='3' selected >Développeur expérimenté</option>"; } 

      else {
          echo "<option value='3'>Développeur expérimenté</option>"; 
      	}

      	?>
  </select>
  <br/><br/>


  <?php

  $code = array("php" => "je sais coder en php", "ruby" => "je sais coder en ruby",
  	"python" => "je sais coder en python","java" => "vive le java");

foreach ($code as $key => $value)
  {
 
  $langagekey = "langage_{$key}";
  //echo $langagekey;

  	if(isset($_GET[$langagekey])) 


  	{
    
    echo  "<input checked type='checkbox' name='langage_".$key."' value='". $key  ."' >". $value ."<br/>"; 
  	}

  	else

  	{

    echo  "<input type='checkbox' name='langage_".$key."' value='". $key  ."' >". $value ."<br/>"; 

  	}
	
  }



   ?>


     <br/><br/>

<?php

$genre = array("homme","femme");

foreach ($genre as $key)
  {

    //echo $key;
   // echo $_GET['genre'];

	 if(isset($_GET['genre']) && $_GET['genre'] == $key)

	 {

	 	echo "<input type='radio' name='genre' value='". $key  ."' checked> $key<br>";

	 }

	 else
	 {

	 	echo "<input type='radio' name='genre' value='". $key  ."'> $key<br>";
	 }
   

  }



?>

 
<br/><br/>

<?php

 if(isset($_GET['message']))

	    { ?>

           <textarea required name="message" rows="4" cols="50">
<?php 
 echo $_GET['message'];

?>

</textarea>   
         
	 	<?php 
	 }

else

{ ?>

<textarea required name="message" rows="4" cols="50">
Pourquoi vous intéressez-vous au développement php  Mysql ? Laissez votre message dans ce champ !</textarea>

<?php

}

?>
  



<br/><br/>

<input type="submit"  value="Envoyer">

  </fieldset>
</form>


</body>

</html>