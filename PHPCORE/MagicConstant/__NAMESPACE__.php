<?php 
//__NAMESPACE__
namespace TestNameSpace;
class Main{
    public function print($name){
        echo($name . "<br>\n");
        echo(__NAMESPACE__);
    }
}
$obj = new Main();
$obj->print("ROHIT");
?>