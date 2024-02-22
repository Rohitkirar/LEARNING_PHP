<?php 
//The precedence order is that methods from the current class override Trait methods, which in turn override methods from the base class.

//preference_order Class -> Trait -> Base class

//Example 
class Base{
    function sayHello(){
        echo "Hello" ;
    }
}
trait SayWorld{
    function sayHello(){
        parent::sayHello();
        echo " World!" ;
    }
}

class HelloWorld extends Base{

    use SayWorld; //overide the function of base class
}

$helloworld = new HelloWorld();
$helloworld->sayHello();

echo "<hr>" ;

// Example 2 ; 

trait HelloWorld1{
    function sayHello(){
        echo "Hello World!<br>" ;
    }
}
class HelloUniverse{
    // use HelloWorld1; class have high preference than trait;
    function sayHello(){
        echo "Hello Universe!<br>";
    }
    use HelloWorld1;
}

$hello = new HelloUniverse();
$hello->sayHello();
?>