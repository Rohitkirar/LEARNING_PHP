<?php 
// static propertie declaration
class StaticPropertiesExample{
    public static $piValue = 3.14;
    public function staticValue(){
        return self::$piValue;
    }
}
$pi = new StaticPropertiesExample();
echo $pi->staticValue() ; 

echo "<HR>";
//Example 2 
class ChildClass extends StaticPropertiesExample{
    public function childfunction(){
        return parent::$piValue;
    }
}
// Get value of static property directly via child class
echo ChildClass::$piValue;

echo "<br>" ;
// or get value of static property via xStatic() method
$childobj = new ChildClass();
echo $childobj->childfunction();
?>