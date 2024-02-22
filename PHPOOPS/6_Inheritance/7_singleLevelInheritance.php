<?php 
//php supports single level inheritance
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

$classobj = new ClassB();

$classobj->print();
$classobj->print1();
?>