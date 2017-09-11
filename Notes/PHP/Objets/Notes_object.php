<?php

// les classes 
    $audi = new voiture(); 
    $peugeot = new voiture();
    echo $audi->kilometrage; // cela affiche "15000" 
    echo $peugeot ->anneedesortie ; // cela affiche "2005"


    class voiture {
     
        // les variables ci-après sont des propriétés des voitures
        public $kilometrage = 15000;
        public $marque = 0; 
        public $anneedesortie = 2005;
     
        // les fonctions ci-après sont des méthodes de voitures
        public function accelerer () {
     
        }
     
        public function accelerer ($vitesse = null) {
       return $vitesse;
        }
     
    $audi->accelerer(30); // cela affiche 30

?>


<?php



class Livre {


	public $titre = "les démons";
 	public $auteur = "dostoievski";
 	public $nbrlivre = "100";
 	public $collection;
 	public $nbrpages;
    public static $couleur;

 	public function getTitre () {

 		echo "Conseils: CEC";
 	}


 	// création fonction ajout

 	public function ajout ($nb = null) {

 		if (is_null($nb)) {

 			$this->nbrLivre = 100;
 			return $this->nbrLivre;
 		}

 		else {

 		$this->nbrLivre = $this->nbrLivre +	$nb;
 		return $this->nbrLivre;
 		}
 	}

 	public function __construct($collection = null, $titre = null, $nb = null) {


 		$this->collection = $collection;
 		$this->titre = $titre;
 		$this->nbrpages = $nb;
 		// return $this->collection;
 	}

}
 	$roman = new Livre ();
 	var_dump($roman)

 	echo $roman->titre;
 	echo $roman->auteur;

 	echo $roman->getTitre();

 	$roman->ajout(5);
 	var_dump($roman);

 	$polar = new Livre("Bibliotheque noire", "les cinq morts", 100);

 	echo $polar->collection;
 	echo $polar->titre;
 	echo $polar->nb;

    Livre::$couleur = "jaune";
    echo $Livre::$couleur;





?>