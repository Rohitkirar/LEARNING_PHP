<?php 
/** 
 self keyword  
*Or, we can access a constant from inside the class by using the self keyword followed by the scope resolution operator (::) followed by the constant name,
*/

class Goodbye{
    const LEAVING_MESSAGE = "THANK YOU FOR VISITING!<BR>" ;

    public function byebye(){
        echo self::LEAVING_MESSAGE ; 
        echo SELF::LEAVING_MESSAGE;
    }
}

$goodbye = new Goodbye();

$goodbye->byebye();
?>