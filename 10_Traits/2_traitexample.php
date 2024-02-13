<?php 
// example 
trait message1{
    public function msg1(){
        echo "OOP is fun!";
    }
    abstract function msg2();
}
class Welcome{
    use message1;
    public function msg1(){
        echo "OOP is fun!";
    }
    public function msg2(){
        echo "OOP is fun2";
    }
}

$obj = new Welcome();
$obj->msg1();
echo "<BR>" ;
$obj->msg2();
?>