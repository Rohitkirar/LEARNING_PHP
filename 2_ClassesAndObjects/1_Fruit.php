<?php 

//Note : In a class, variable are called propertis and function are called methods
//Declaring Fruit Class
class Fruit{
    public $name;
    public $color;


    function set_name($name){
        $this->name = $name;
    }
    function get_name(){
        return $this->name;
    }
}

$apple = new Fruit();
$banana = new Fruit();

$apple->set_name('Apple');
$banana->set_name('Banana');

echo $apple->get_name() . "<br>";
echo $banana->get_name();

echo "<HR>" ;

echo "EXAMPLE 2 : <BR>" ;
class FruitDetails extends Fruit {
    public $color ; 
    function set_color($color){
        $this->color = $color;
    }
    function get_color(){
        return $this->color;
    }
}

$appledetails = new FruitDetails();

$appledetails->set_name('Apple') ;
$appledetails->set_color('Red') ;

echo "Name : " . $appledetails->get_name() . "<br>";
echo "Color : " . $appledetails->get_color() . "<br>";
?>