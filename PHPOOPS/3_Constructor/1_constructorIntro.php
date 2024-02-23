<?php 
/*
A constructer allows you to initialize an objects properties  upon creation of the object.

SYNTAX : 
function __construct(parameter1 , ...){

}


If you create a __construct() function, PHP will automatically call this function when you create an object from a class.

note: the constructor function starts with two underscores(__);
*/

class Fruit{
    public $name;
    public $color;

    function __construct($name , $color){
        $this->name = $name;
        $this->color = $color;
    }

    function get_details(){
        return "Name : $this->name | color : $this->color<hr>" ;
    }
}

$apple = new Fruit("Apple" , "Red");
echo $apple->get_details();
?>