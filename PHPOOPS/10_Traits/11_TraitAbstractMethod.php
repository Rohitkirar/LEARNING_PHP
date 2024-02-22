<?php
//It is possible to declare abstract method in trait also with access modifier public and protected only 

//normal methods in trait declare with access modifier public , protected and private.

trait Hello{
    public function sayHelloWorld(){
        echo "Hello ". $this->getWorld();
    }
    abstract public function getWorld();
}

class MyHelloWorld{
    private $world;
    use Hello;
    public function setWorld($world){
        $this->world = $world ; 
    }
    public function getWorld(){
        return $this->world;
    }
}
$myhelloworld = new MyHelloWorld();
$myhelloworld->setWorld("World") ;
$myhelloworld->sayHelloWorld();
?>