<?php 


class Cars {


	public $wheel_count = 4;

	static $door_count = 4;



function __construct(){

// echo $this->wheel_count;
echo self::$door_count++;

	}


	function __destruct(){

// echo $this->wheel_count;
echo self::$door_count--;

	}



// 	function details(){

// echo $this->wheel_count;


// 	}


}

$bmw = new Cars();

$merceds = new Cars();

$merceds_2 = new Cars();
// $bmw->details();





 ?>
