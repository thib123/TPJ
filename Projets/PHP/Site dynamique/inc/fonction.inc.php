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

function debutPage($titre){
    
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--

	zenlike1.0 by nodethirtythree design
	http://www.nodethirtythree.com

-->
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>'.$titre.'</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="default.css" />
</head>
<body>

<div id="upbg"></div>

<div id="outer">


	<div id="header">
		<div id="headercontent">
			<h1>'.$titre.'</h1>
		</div>
	</div>


	<form method="post" action="">
		<div id="search">
			<input type="text" class="text" maxlength="64" name="keywords" />
			<input type="submit" class="submit" value="Search" />
		</div>
	</form>


	<div id="headerpic"></div>';
}

function afficheMenu(){
    
    echo '	<div id="menu">
		<!-- HINT: Set the class of any menu link below to "active" to make it appear active -->
		<ul>
			<li><a href="index.php">Home</a></li>';
    
    $handle = opendir('/Applications/XAMPP/xamppfiles/htdocs/menu');
    
    while ($fichier = readdir($handle))
    {
        if($fichier!="." && $fichier!=".."){
            $module = substr($fichier,0,-4);
            $label = str_replace("_"," ",substr($fichier,0,-4));
            echo "<li><a href='index.php?cmd=$module'>$label</a></li>";
        }   
    }
    echo '	</ul>
	</div>
	<div id="menubottom"></div>';
}

function contenuPage($titre, $texte){
    
    echo '	<div id="content">

		<!-- Normal content: Stuff thats not going to be put in the left or right column. -->
		<div id="normalcontent">
			<h3>'.$titre.'</h3>
			<div class="contentarea">
				<!-- Normal content area start -->
                                <p>'.$texte.'</p>
				<!-- Normal content area end -->
			</div>
		</div>

	
		<div class="divider1"></div>


		<!-- Primary content: Stuff that goes in the primary content column (by default, the left column) -->
		<div id="primarycontainer">
			<div id="primarycontent">
				<!-- Primary content area start -->';

afficheArticle("titre 1", "texte 1");		
echo '	<div class="divider2"></div>';

afficheArticle("titre 2", "texte 2");		
echo '	<div class="divider2"></div>';

afficheArticle("titre 3", "texte 3");		
	

	echo ' <!-- Primary content area end -->
			</div>
		</div>';
}

function afficheArticle($titre, $texte){
    
    echo '<div class="post">
            <h4>'.$titre.'</h4>
            <div class="contentarea">
            <p>'.$texte.'</p>
            </div>
    </div>';
}

function colonneDroite($titre, $texte, $titreLiens, $tableauLiens){
    
    echo '<!-- Secondary content: Stuff that goes in the secondary content column (by default, the narrower right column) -->
		<div id="secondarycontent">
			<!-- Secondary content area start -->
			
			<!-- HINT: Set any divs class to "box" to encapsulate it in (you guessed it) a box -->
			<div class="box">
				<h4>'.$titre.'</h4>
				<div class="contentarea">
                                <p>'.$texte.'</p>
				</div>
			</div>
		
			<div>
				<h4>'.$titreLiens.'</h4>
				<div class="contentarea">
					<ul class="linklist">';
    
    foreach( $tableauLiens as $key => $value ){
        echo '<li><a href="'.$value.'">'.$key.'</a></li>';        
    }
    echo '      </ul>
            </div>
	</div>
	<!-- Secondary content area end -->';
}

function finPage($titre){
    
    echo '		</div>


	</div>

	<div id="footer">
			<div class="left">&copy; 2015 '.$titre.'. All rights reserved.</div>
			<div class="right">Design by <a href="http://www.nodethirtythree.com/">NodeThirtyThree Design</a></div>
	</div>
	
</div>

</body>
</html>';
    
}
