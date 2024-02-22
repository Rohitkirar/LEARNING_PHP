<?php 
//static keyword is used to declare a static method and properties;
//with the help of static keyword we declare properties and methods belongs to class level;

Echo "<hr><h1>example 1</h1><br>" ;

class Main{
    public static $name = "ROHIT KIRAR";

    static function printdetails(){
        Main::$name = "Arun Shrivastav" ;
        echo Main::$name . "<BR>";
    }
}
echo Main::$name . "<BR>";

$main = new Main();
$main->printdetails(); // static method also accessable from class instance

echo Main::$name . "<BR>";

Echo "<hr><h1>example 2</h1><br>" ; 

class greeting{
    public static function welcome(){
        echo "Hello World<br>";
    }
}

greeting::welcome();


?>