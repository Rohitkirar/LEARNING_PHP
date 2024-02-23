<?php 

class ParentClass{
    static $username = "ROMAN REIGN";
    static function printdetails(){
        echo "using self keyword : " . self::$username . "<BR>";
        echo "using ClassName : " . ParentClass::$username . "<BR>";
    }
}
echo ParentClass::$username . "<BR>";
ParentClass::printdetails();

class ChildClass extends ParentClass{

    static function callStaticfunction(){
        echo "Calling parent static function from childclass function : <BR>";
        self::printdetails();
    }
}
echo "<hr>" ;
echo ChildClass::$username."<BR>";
ChildClass::callStaticfunction();
?>