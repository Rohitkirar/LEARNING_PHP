<?php 
/** 
Class Constants 
* class constants can be useful if you need to define some constant data within a class.
*A class constant is declared inside a class with the const keyword.

case-sensitive
*A constant cannot be changed once it is declared.
*Class constants are case-sensitive. However, it is recommended to name the constants in all "uppercase letters".

scope resolution operator 
*We can access a constant from outside the class by using the class name followed by the scope resolution operator (::) followed by the constant name.

self keyword 
*Or, we can access a constant from inside the class by using the self keyword followed by the scope resolution operator (::) followed by the constant name,
*/

class Goodbye{
    const Greeting_message = "Hello, Welcome to the Silversky Technology.<br>" ;
    const LEAVING_MESSAGE = "Thank you for visiting SilverSky Technology!<br>";

}
//excess const variable of class by using scope resolution operator like Classname::CONSTNAME;

// echo GOODBYE::GREETING_MESSAGE; //case sensitive error

echo GOODBYE::Greeting_message; 
echo Goodbye::LEAVING_MESSAGE;
?>