<?php 
//__TRAIT__ : return Trait name 
trait MyTrait{
    public function traitFunction(){
        echo( __TRAIT__);
    }
}
class Main{
    use MyTrait;
}
$obj = new Main();
$obj->traitFunction();
?>