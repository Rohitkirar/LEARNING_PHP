<?php 
//PHP supports multi level inheritence

class ClassA{
    function print(){
        echo "output from ClassA<br>";
    }
}
class ClassB extends ClassA{
    function print1(){
        echo "output from ClassB<br>";
    }
}
class ClassC extends ClassB{
    function print2(){
        echo "output from ClassC<br>";
    }
}

$classobj = new ClassC();
$classobj->print();
$classobj->print1();
$classobj->print2();


?>