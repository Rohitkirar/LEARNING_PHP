<?php 

//Example insteadof and as  keyword simultaneously to use both the methods
trait Bike{
    function speed(){
        echo "Bike have maximum speed is upto to 220 km/hr<br>" ;
    }
    function wheeler(){
        echo "Bike is a two wheeler vehicle<br>";
    }
}
trait Bicycle{
    function speed(){
        echo "Bicycle have maximum speed is upto to 20 km/hr<br>" ;
    }
    function wheeler(){
        echo "Bicycle is a two wheeler vehicle<br>";
    }
}

class Vehicle {
    use Bike , Bicycle{
        Bike::speed insteadof Bicycle;
        Bike::wheeler insteadof Bicycle;
        Bicycle::speed as speed1;
        Bicycle::wheeler as wheeler1;
    }
}
$vehicle = new Vehicle();
$vehicle->speed();
echo "<hr>";
$vehicle->wheeler();
echo "<hr>";
$vehicle->speed1();
echo "<hr>"; 
$vehicle->wheeler1();
?>