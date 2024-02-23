<?php 
/*
PHP has nine predefined constants that change value depending on where they are used, 
and therefor they are called "magic constants".

These magic constants are written with a double underscore at the start 
and the end, except for the ClassName::class constant.
The magic constant are case insensitive
__CLASS__	If used inside a class, the class name is returned.	
__DIR__	The directory of the file.	
__FILE__	The file name including the full path.	
__FUNCTION__	If inside a function, the function name is returned.	
__LINE__	The current line number.	
__METHOD__	If used inside a function that belongs to a class, both class and function name is returned.	
__NAMESPACE__	If used inside a namespace, the name of the namespace is returned.	
__TRAIT__	If used inside a trait, the trait name is returned.	
ClassName::class	Returns the name of the specified class and the name of the namespace, if any.
*/
//__LINE__
namespace MyNameSpace;


"<br>";

//__METHOD__  and __CLASS__
class MagicConst{ 

    function magicConstFun(){
        echo("\n" . __METHOD__ );
        echo("\n" . __FUNCTION__);
        Echo("\n" . __CLASS__);
    }
}
$obj = new MagicConst();
$obj->magicConstFun();

"<br>";


//__NAMESPACE__
class Main{
    use MyTrait;
    function namespace(){
        echo("\n" . __NAMESPACE__);
    }
}
$obj2 = new Main();
$obj2->traitFunction();
$obj2->namespace();


?>
