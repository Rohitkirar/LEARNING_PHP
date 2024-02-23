<?php 
/**
 What are Abstract classes and Methods?
 *Abstract classes and methods are when the parent class has a named method , but need its child classes to fill out the tasks.
 *An abstract class is a class that contains at least one abstract method. An abstract method is a method that is declared, but not implement in the code.

 * NOTE : An abstract class or method is defined with the "abstract" keyword;
 * 
 We have the following rules, when a child class is inherited from an abstract class : -
 
 * The child class method must be defined with the same name and it redeclares the parent abstract method
 
 * The child class method must be defined with the same or a less restricted access modifier
 
 * The number of required arguments must be the same. However, the child class may have optional arguments in addition.
   
*/
//syntax of writing abstract class 

abstract class ParentClass{
    abstract public function someMethod1();
    abstract public function someMethod2($name , $color);
    abstract public function someMethod3() : String;
}
?>