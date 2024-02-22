<?php 
/**
 
->final keyword
* final keyword is used to prevent class inheritance or to prevent method overriding;

->key points to Remember : - 

*If use final infront of class than the class is not used to inherit the properties and method
*/

final class Fruit {
    // some code
  }
  
  // will result in error
  class Strawberry extends Fruit { //error generating
    // some code
  }


?>