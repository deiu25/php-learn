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
    echo "The Car method exist";
} else {
    echo "No";              echo "<br><br>";
}



class Plane {
    
}

if(class_exists("Plane")) {
    echo "The Plane class exist";
} else {
    echo "No";
}

//Constructor
function __construct(){
    echo $this -> wheels = 10;
}
$bmw = new Car();           echo "<br><br>";




class Persoana {
    public $nume; //props
    public $varsta;
    
    public function Saluta() { //metoda
        echo "Salut! Numele meu este " . $this -> nume;
    }
}

$persoana1 = new Persoana; //obiect
$persoana1 -> nume = "Ion.";
$persoana1 -> Saluta();

?>