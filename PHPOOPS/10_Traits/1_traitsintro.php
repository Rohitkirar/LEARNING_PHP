<?php 
/*
What are Traits?
PHP only supports single inheritance: a child class can inherit only from one single parent.

So, what if a needs to inherit multiple behaviours? OOP traits solve this problem

Traits are used to declare properties and  methods that can be used in multiple classes. 
Traits can have methods and abstract methods that can be used in multiple classes, and the methods can have any access modifier (public , private or protected);
*/

trait TraitName{
    //some codes...
}

//to use trait in a class, use the use keyword:

class MyClass{
    use TraitName;

}
?>