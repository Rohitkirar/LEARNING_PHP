<?php 
/*
PHP - Access Modifiers :- "Properties and methods" can have access modifiers which control where they can be accessed.

There are three access modifiers:
->public - the property or method can be accessed from everywhere. This is default
->protected - the property or method can be accessed within the class and by classes derived from that class
->private - the property or method can ONLY be accessed within the class

*/

//Example 1 
class Fruit{
    public $name ;
    protected $color ;
    private $weight; 

}

$mango = new Fruit();
$mango->name = "Mango" ;
// $mango->color = "Yellow";
// $mango->weight = "weight" ;
echo $mango->name;
?>