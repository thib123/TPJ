<?php 


class Cars {

var $wheels = 5;


function gretting(){

	return "hello";


	}



}


$bmw = new Cars();



class Trucks extends Cars {


}


$tacoma = new Trucks();

echo $tacoma->wheels;








 ?>
