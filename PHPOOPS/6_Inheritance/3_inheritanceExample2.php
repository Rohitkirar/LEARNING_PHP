<?php 
//Example 2 
//Inheritance and the protected access modifiers(We know that protect modifier class properties and methods can we access within the class and its derived class only)

class Fruit{
    public $name , $color ;
    public function __construct($name , $color){
        $this->name = $name;
        $this->color = $color;
    }
    protected function intro(){
        echo "The fruit is {$this->name} and the color is {$this->color}.<br>";
    }
}
class Strawberry extends Fruit{
    public function message(){
        echo "Am I a fruit or a berry?<br>";
        $this->intro();//call the protected methods
    }
}

$strawberry = new Strawberry("Strawberry" , "red") ;

$strawberry->MessAge();

// $strawberry->intro(); // error intro() is protected;
?>