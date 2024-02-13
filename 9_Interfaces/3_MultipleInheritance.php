<?php 

//Example 2  Basic example to implement multiple inherintance using interface;

interface Walkable{
    function walk();
} 
interface Swimable{
    function swim();
}

class Duck implements Walkable, Swimable{
    function swim(){
        echo "Duck is swimming" ;
    }
    function walk(){
        echo "Duck is walking";
    }
}

$duck = new Duck;
$duck->swim();
echo "<BR>" ;
$duck->walk();
?>