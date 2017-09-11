<?php 


class Cars {


Private $door_count = 4;



function get_values(){


	echo $this->door_count;


}


function set_values(){


	$this->door_count = 10;


}


}

$bmw = new Cars();

$bmw->set_values();

$bmw->get_values();





 ?>
