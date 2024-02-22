<?php 
//we can also extends two interface with the help of extends keywords;
interface Vehicle{
    function brake();
    function clutch();
    function engine();
}
interface MotorBike extends Vehicle{
    function wheeler() ; 
}

Class Bike implements MotorBike{
    function brake(){
        echo "Bike have brake feature<br>";
    }
    function clutch(){
        echo "Bike have clutch feature<br>" ;
    }
    function engine(){
        echo "Bike consists 100 to 350 cc engines<br>" ;
    }
    function wheeler(){
        echo "bike is a  two wheeler Vehicle<br>";
    }
}

$splendor = new Bike();
$splendor->brake();
$splendor->clutch();
$splendor->engine();
$splendor->wheeler();
?>