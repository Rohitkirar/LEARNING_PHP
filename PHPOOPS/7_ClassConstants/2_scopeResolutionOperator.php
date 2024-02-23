<?php 
/**
scope resolution operator 
*We can access a constant from outside(also from inside the class) the class by using the class name followed by the scope resolution operator (::) followed by the constant name.

 */

 class Main{
    const USERNAME = "ARUN123";
    const PASSWORD = "ARUN@123"  ;
    function print(){
    echo Main::USERNAME; // we can also excess inside the class;
    }
 }

 $username = "ARUN123" ; 
 $password = 'Arun@123' ;

 if($username == Main::USERNAME){
    if($password == Main::PASSWORD){
        echo "USER validated successfully<br>" ;
    }
    else{
        echo "Invalid password<br>" ;
    }
 }
 else{
    echo "invalid username/password <br>" ;
 }

 $main = new Main();
 $main->print();
?>