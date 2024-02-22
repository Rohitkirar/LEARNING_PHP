<?php 
/*
PHP - Static Methods
* static methods can be called directly - without creating an instance of the class first

* static methods are declared with the static keyword

* To access a static method use the class name, double colon (::), and the method name:

*Static properties are accessed using the Scope Resolution Operator (::) and cannot be accessed through the object operator (->).

*child class also change static variable value for parent class;
*static method of parent directly call in child with the resolution scope operator ::

*"parent keyword" : To call a static method from a child class, use the parent keyword inside the child class. Here, the static method can be public or protected.
*/
//Syntax 
class ClassName {
    public static function functionName(){
        echo "HELLO WORLD<br>";
    }
}

ClassName :: functionName();

$classname = new ClassName();
$classname->functionName();

?>