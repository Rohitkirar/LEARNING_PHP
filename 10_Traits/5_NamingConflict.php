<?php
/*
when two trait have same methods name and use in single class then there is error cause to handle this we have two keyword  : 
-> insteadof : this keyword is use to choose exactly one of the method is use from both trait in a class
-> as : this keyword declare an alias name for one of the method to use both in class so that the naming conflict not occur

*/
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

echo "<HR><HR>" ;
//as example;

class Vehicle1 {
    use Bike , Bicycle{
        Bike::speed insteadof Bicycle;
        Bicycle::wheeler insteadof Bike;
        Bike::wheeler as wheeler1;
        Bicycle::speed as speed2;
    }
}
$vehicle1 = new Vehicle1();
$vehicle1->speed();
echo "<hr>";
$vehicle1->wheeler1();
echo "<hr>";
$vehicle1->speed2();
echo "<hr>";
$vehicle1->wheeler();
?>