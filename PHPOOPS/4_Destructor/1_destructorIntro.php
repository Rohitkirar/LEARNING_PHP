<?php 
/*
* A destructor is called when the object is destructed or the script is stopped or exited;

* Destructors are for destroying objects and automatically called at the end of execution.

SYNTAX :- 
function __destruct(){
    //destroying the object or clean up resources here
}

If we create a __destruct() function, PHP will automaticall call this function at the end of the script

imp : Tip: As constructors and destructors helps reducing the amount of code, they are very useful!
*/

//EXAMPLE 1 : 
class Fruit{
    public $name ;
    public $color;
    function __construct($name , $color){
        $this->name = $name;
        $this->color = $color;
    echo "HELLO WORLD<br> ";
    echo "HELLO WORLD<br> ";
    echo "HELLO WORLD<br> ";
    }
    
    function __destruct(){
        echo "The fruit is {$this->name} and the color is {$this->color}.<br>";
    }

    function print(){
        echo "Hello World<br>" ;
        echo "Hello World<br>" ;
        echo "Hello World<br>" ;
    }
}

$apple = new Fruit("Apple" , "Red") ;

$apple->print();

//__destruct() always run at the end of the script;
?>