<?php 
//child class also change static variable value for parent class;

Echo "<hr><h1>example 1</h1><br>" ;

class ParentClass {
    public static $myStaticProperty = 'fool';
}

class ChildClass extends ParentClass {
    public static function getStaticProperty() {
        return parent::$myStaticProperty;
    }
    public static function getStaticProperty2() {
        self::$myStaticProperty = "April fool";
        return ParentClass::$myStaticProperty;
    }
}

echo ChildClass::getStaticProperty();
echo "<BR>";
echo ChildClass::getStaticProperty2();
echo "<BR>";

echo ParentClass::$myStaticProperty; //child class also change static variable value for parent class;

?>