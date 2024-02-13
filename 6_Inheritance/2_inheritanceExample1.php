<?php 
//Example 1 ;
class Fruit{
    public $name , $color ;
    public function __construct($name , $color){
        $this->name = $name;
        $this->color = $name;
    }
    public function intro(){
        echo "The fruit is {$this->name} and the color is {$this->color}.<br>";
    }
}

class Strawberry extends Fruit{
    public function message(){
        echo "Am I a fruit or a berry?<br>" ;
    }
}
$strawberry = new Strawberry("Strawberry" , "Red");
$strawberry->message();
$strawberry->intro();


/* Example Explained

The Strawberry class is inherited from the Fruit class.

This means that the Strawberry class can use the public $name and $color properties as well as the public __construct() and intro() methods from the Fruit class because of inheritance.

The Strawberry class also has its own method: message().
*/
?>