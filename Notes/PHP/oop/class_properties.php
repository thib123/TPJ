<?php 


class Cars {


	var $wheel_count = 4;
	var $door_count = 4;



function car_detail(){

	return "This car has " . $this->wheel_count . " Wheels";


	}


}

$bmw = new Cars();
$mercedes = new Cars();

echo $bmw->wheel_count = 10;

echo "<br>";

echo $mercedes->wheel_count . "<br>";

echo $mercedes->car_detail();






 ?>
