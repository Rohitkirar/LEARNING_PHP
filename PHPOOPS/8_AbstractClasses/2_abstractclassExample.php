<?php 

//Example 1 

//parent class
abstract class Car{
    public $name ; 
    public function __construct($name){
        $this->name = $name ;
    }
    abstract public function intro() :string;
}

//child class
class Audi extends Car {
    public function intro() : string{
        return "choose German Quality! I'm an $this->name!<br>";
    }
}

class Volvo extends Car{
    public function intro() : string{
        return "Proud to be swedish! I'm a $this->name!<br>";
    }
}

class Thar extends Car{
    public function intro() : string{
        return "Mahendra Brand : I'm a $this->name";
    }
}

// create objects from the child class 

$audi = new Audi("AUDI") ;

$str = $audi->intro();
echo $str ;

echo "<hr>" ;

$volvo = new volvo("Volvo");
echo $volvo->intro();

echo "<hr>" ;

$thar = new Thar("Thar");
echo $thar->intro();

echo "<hr>";

/*
Example Explained
The Audi, Volvo, and Citroen classes are inherited from the Car class. This means that the Audi, Volvo, and Citroen classes can use the public $name property as well as the public __construct() method from the Car class because of inheritance.

But, intro() is an abstract method that should be defined in all the child classes and they should return a string.
*/
?>