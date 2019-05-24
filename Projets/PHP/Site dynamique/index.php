<?php
/*
==================================================================

	Copyright (c) 2015 Marc Augier

	The full license can be read in "license.txt".

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	See the GNU General Public License for more details.

	Contact: m.augier@me.com
================================================================
*/

include ('inc/fonction.inc.php');

$module = $_GET[cmd];

if ($module == '')
{
    $titre = "Voici le titre";
    $contenu = "le texte principal de ma page";
} else {
    include('menu/'.$module.'.php');
}


debutPage("Ma première page");

afficheMenu();

contenuPage($titre, $contenu);

colonneDroite("de ce côté","on trouve un petit bout de texte","Quelques liens", array('Google' => 'http://www.google.fr','Twitter' => 'http://www.twitter.com'));

finPage("Mon premier site");


?>