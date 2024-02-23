<?php 
/*
What is Inheritance;
Inheritance in oop : The child class will inherit all the public and protected properities and methods from the parent class. In addition, It can have its own properties and methods.

//An inherited class is defined by using the extends keywords.
*/
class ParentClass{
    public $name , $city;
    function print(){
        echo "Name : $this->name<br>City : $this->city<br>" ;
    }
}

class ChildClass extends ParentClass{
    public $contact;
    function print_details(){
        $this->print();
        echo "Contact : $this->contact" ;
    }
}

$childobj = new ChildClass();
$childobj->name = "ARUN" ;
$childobj->city = "Indore";
$childobj->contact = "39423030" ;
$childobj->print_details();
?>