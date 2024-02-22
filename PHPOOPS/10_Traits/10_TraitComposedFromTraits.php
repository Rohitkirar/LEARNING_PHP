<?php 
//Trait composed from trait 
//Just as classes can make use of traits, so can other traits. By using one or more traits in a trait definition, it can be composed partially or entirely of the members defined in those other traits.

trait Hello{
    function sayHello(){
        echo "Hello";
    }
}
trait World{
    use Hello;
    function sayWorld(){
        echo " World<br>" ;
    }
}

class HelloWorld{
    use World;
}

$helloworld = new HelloWorld();
$helloworld->sayHello();
$helloworld -> sayWorld();


?>