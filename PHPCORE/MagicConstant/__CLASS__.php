<?php 

//__CLASS__ : return class name
class MagicConst{ 

    function magicConstFun(){

        Echo("\n" . __CLASS__);
    }
}
$obj = new MagicConst();
$obj->magicConstFun();


?>