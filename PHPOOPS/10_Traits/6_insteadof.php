<?php 
//Example insteadof keyword
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
        Bicycle::wheeler insteadof Bike;
    }
}
$vehicle = new Vehicle();
$vehicle->speed();
echo "<hr>";
$vehicle->wheeler();
?>