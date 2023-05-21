<?php

class Car {
    function MoveWheels(){
        echo "Wheels move";
    }
}

if(method_exists("Car", "MoveWheels")) {
    echo "The method exist";
} else {
    echo "No";
}

?>