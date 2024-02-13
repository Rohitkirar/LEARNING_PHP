<?php 

interface Vehicles {
    function changeGear($var);
    function speedUp($var);
    function speedDown($var);
    function applyBrake();

}
class Bike implements Vehicles{
    public $speed=0 , $gear=0 ;
    function changeGear($newgear){
        $this->gear = $newgear;
    }
    function speedUp($speed){
        $this->speed += $speed;
    }
    function speedDown($speed){
        $this->speed -= $speed ;
    }
    function applyBrake(){
        $this->speed = 0;
    }

    function __destruct(){
        echo "Speed : $this->speed<BR>
        Gear : $this->gear<BR>";
    }
}
$bike = new Bike();
$bike->changeGear(1);
$bike->speedUp(70);
$bike->speedDown(20);




?>