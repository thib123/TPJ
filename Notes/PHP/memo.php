<?php
// insérer enregistrement dans la table

$sql ="INSERT INTO matable (Nom, prenom, age) VALUES ('Dumont', 'Jacques', '23')";

$num = $conn -> exec(sql);

if($num)  {
    echo "Vous avez bien inséré" . $num . "enregistrement";
}
else {
 echo "échec";   
}
?>


<?php

//envoi du form

if(isset($_GET['envoi'])) {
    
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $age = $_GET['age'];
    
    
    
    $sql ="INSERT INTO matable (Nom, prenom, age) VALUES ('".$nom."', '".$prenom."', '".$age."')";

$num = $conn -> exec(sql);

if($num)  {
    echo "Vous avez bien inséré" . $num . "enregistrement";
}
else {
 echo "échec"; . nl2br("/n");  
 echo "Valider le formulaire";
}
    
}

else {
    
    echo "échec";
}

//Formulaire

<html>
    
    <head>
            <body>
    <form method="get"; action="nomfichierdeconnection"
    
        Nom: <input type"text" name "nom" size="10">    
        Prenom: <input type"text" name "prenom" size="10">    
        Age: <input type"text" name "age" size="10">    

        <input type="hidden" name="envoi" value="1">
        <input type"submit" value="envoyer">    
            
        
    </form>    
    </body>
    
    
    </head>
    
    </html>
    










?>
<?php

if(isset($_GET['envoi'])) {

    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $age = $_GET['age'];
    $id = $_GET['id']

    //Maj table


    $sql ="UPDATE matable SET NOM = '".$nom."' , '".$prenom."' , '".$age."' WHERE Id = '".$id."'";

    $num = $conn -> exec($sql);

        if($num) {

            echo "Maj effectuée sur " . $num . " enregistrement";

        }
            else {

                echo "échec de la maj";
            }




}




?>


<?php

//connexion db php

$dsn = "mysql:dbname=;host=localhost;charset=UTF8";
$user = "";
$password ="";


    try {


        $conn = new PDO ($dsn,$user,$password);

        echo " connexion établie";

    }

    catch (PDOException $e) {


        echo "connexion impossible : " .$e ->getMessage ();
    }

?>


// form réalisation de saisies.

<?php

require 'connexion-pdo.php';

if(isset($_POST['thematique']) && isset($_POST[nom]) && isset($_POST[email])) 

    {

        // insertion

        $thematique = $_POST['thematique'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $date = $_POST['date'];

        echo $thematique;
        echo $nom;
        echo $email;
        echo $date;

        $sql = "INSERT INTO DB (Nom, Thematique_Id, mail, moment) VALUES ('" . $nom . "', '" . $thematique . "', '" . $email . "', '" . $date . "')";
        
        if(($donnes = $conn->exec($sql)) != 0)
        {
            echo "enregistrement ok";
        }

        else {

            echo "échec de l'enregistrement";
        }



        // recup db

        $sql ="SELECT * FROM db";
        $donnes = $conn->query($sql);

        $select_thematique = "<option value='' selected> Selectionnez une thematique</option>";
        foreach ($donnes as $row) {

            $select_thematique = $select_thematique . " <option value='". $row[id] ."'>". 
            $row[nom] ."<option>";
        }
}

?>

<form action="thematique.php" method="post">
    Nom:    <input type="text" name"nom" size ="15"><br></br>
    Email:  <input type="text" name="email" size ="15"><br></br>
            <input type="hidden" name="date" value="<?php echo time(); ?>">

    Thematique:<select name="thematique" required="">
            <?php echo $select_thematique; ?>

        </select><br></br>


    <input type="submit" value="envoyer">

</form>









// recup liste







<html>
<head>
    <style>
    h3 {color:#3333;}
    h3 { font-family: arial; }

    </style>
</head>

<?php

require 'connexion-pdo.php';

$sql = "SELECT * FROM table1 INNER JOIN table2 where table1.Id = table2.Id";
$donnes = $conn->query($sql);

echo "<table border=1">;

foreach ($donnes as $row) {
    echo  "<tr>";
        echo "<td>";

            echo $row['Nom'];

        echo "</td>";

                echo "<td>";

            echo $row['Nom_thematique'];


                echo "</td>";


    echo "</tr>";
}


    echo "</table>";
?>


<body>



    </body>
    </html>


// fonction query

<?php



    try {


        $database = new PDO('mysql:host=localhost;dbname=db', 'root','');
        $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }

    catch (Exception $e) {


        echo "connexion impossible : " .$e ->getMessage ();
    }

    $results = $database->query('SELECT champ FROM table');
    // $database->query('INSERT INTO db(champ1, champ2) VALUES ('donnees1', 'donnes2')');

    while($row = $result->fetch())
    {
        echo $row['table'].'<br>';
    }

?>

// Prepare

<?php

$sql = $database->prepare('INSERT INTO db(champ1, champ2) VALUES ('?', '?')');

$var1 = "valeur1";
$var2 = "valeur2";

$sql->execute(array($var1,$var2));


?>


// php objects

