<?php 
//final keyword is used to prevent class inheritence or method overiding ;

class Fruit{
    final public function intro(){
        echo "This is the Parent Fruit class final intro() function <br>";
    }

    function overloadingfunction($name , $age){
        echo "Name : $name , Age : $age<br>";
    }
    //overloading is not possible in php
    // function overloadingfunction($name , $age , $contact){
    //     echo "Name : $name , Age : $age , Contact : $contact<br>";
    // } 

}

class Strawberry extends Fruit{
    //we can put methods of class in try..catch block
        
    // public function intro(){
    //         echo "I am overiding the final intro() function <br>";
    //     }

}

$strawberry = new Strawberry();
$strawberry->intro(); // generating an error can't override a final method
$strawberry->overloadingfunction("ROHIT" , "21");
$strawberry->overloadingfunction("ROHIT" , "21" , "3u093u");
?>