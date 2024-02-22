<?php 

//calling a trait without externally call it by an object 

trait NewTrait{
    function show(){
        echo "I am calling from trait<br>";
    }
}

class MyClass {
    use NewTrait;
    function fun(){  
        echo "This is a funtion<br>";
        $this->show();
    }
   
}
$myclass = new MyClass();
$myclass->fun();
?>