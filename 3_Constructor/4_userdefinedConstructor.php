<?php 
/*
User-defined V/s Pre_defined Constructor

->Userdefined constructor is the constructer that is defined with the same name of class to initailize the properties in class.

Syntax: 
function className(){
    //user-defined constructor
}

->Predefined constructor is the constructer that is defined by php to initialize the object.

Syntax : 
function __construct(){
    //predefined constructor
}
*/

class Main{
    public $id , $name;
    // function Main($id , $name){
    //     $this->id   = $id ;
    //     $this->name = $name ;
    // }
    function __construct($id , $name){
        $this->id   = $id ;
        $this->name = $name ;
    }

    function getdetails(){
        echo "Id : $this->id | Name : $this->name<br>";
    }
}

$obj = new Main(101 , "Rohit Kirar") ;

$obj->getdetails();
?>