<?php

class Car {
    
    var $wheels = 4;
    var $hood = 1;
    var $engine = "2.0";
    var $doors = 5;
    
    function ChangeDoorsProp(){
        $this -> doors = 3;
    }
}

$bmw = new Car();
$dacia = new Car();

$bmw -> ChangeDoorsProp();
echo $bmw -> doors . " doors";   echo "<br><br>";

$bmw -> engine = "3.0";
echo $bmw -> engine . " engine";                echo "<br><br>";



if(method_exists("Car", "MoveWheels")) {
    echo "The method exist";
} else {
    echo "No";
}

?>