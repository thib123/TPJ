<?php

$perso1 = new Personnage(60, 0); // 60 de force, 0 dégât
$perso2 = new Personnage(100, 10); // 100 de force, 10 dégâts

$perso1->setForce(10);
$perso1->setExperience(2);

$perso2->setForce(90);
$perso2->setExperience(58);

$perso1->frapper($perso2);  
$perso1->gagnerExperience(); 

$perso2->frapper($perso1);  
$perso2->gagnerExperience(); 

echo 'Le personnage 1 a ', $perso1->force(), ' de force, contrairement au personnage 2 qui a ', $perso2->force(), ' de force.<br />';
echo 'Le personnage 1 a ', $perso1->experience(), ' d\'expérience, contrairement au personnage 2 qui a ', $perso2->experience(), ' d\'expérience.<br />';
echo 'Le personnage 1 a ', $perso1->degats(), ' de dégâts, contrairement au personnage 2 qui a ', $perso2->degats(), ' de dégâts.<br />';


class Personnage
{
  private $_force;
  private $_localisation;
  private $_experience;
  private $_degats;

  public function __construct($force, $degats) // Constructeur demandant 2 paramètres
  {
    echo 'Voici le constructeur !'; // Message s'affichant une fois que tout objet est créé.
    $this->setForce($force); // Initialisation de la force.
    $this->setDegats($degats); // Initialisation des dégâts.
    $this->_experience = 1; // Initialisation de l'expérience à 1.
  }

  // Mutateur chargé de modifier l'attribut $_force.
  public function setForce($force)
  {
    if (!is_int($force)) // S'il ne s'agit pas d'un nombre entier.
    {
      trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }

    if ($force > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
    {
      trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
      return;
    }

    $this->_force = $force;
  }

  // Mutateur chargé de modifier l'attribut $_degats.
  public function setDegats($degats)
  {
    if (!is_int($degats)) // S'il ne s'agit pas d'un nombre entier.
    {
      trigger_error('Le niveau de dégâts d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }

    $this->_degats = $degats;
  }
}
?>


<?php
class Personnage
{
  private $_force;
  private $_localisation;
  private $_experience;
  private $_degats;

  const FORCE_PETITE = 20;
  const FORCE_MOYENNE = 50;
  const FORCE_GRANDE = 80;

  // Variable statique PRIVÉE.
  private static $_texteADire = 'Je vais tous vous tuer !';

  public function __construct($forceInitiale)
  {
    $this->setForce($forceInitiale);
  }
  
  public function setForce($force)
  {
    // On vérifie qu'on nous donne bien soit un « FORCE_PETITE », soit une « FORCE_MOYENNE », soit une « FORCE_GRANDE ».
    if (in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE]))
    {
      $this->_force = $force;
    }
  }

  public static function parler()
  {
    echo self::$_texteADire; // On donne le texte à dire.
  }
}

?>