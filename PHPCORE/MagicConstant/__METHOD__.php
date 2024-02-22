<?php

// __METHOD__ : return function name along with class name
class MagicConst{ 

    function magicConstFun(){

        Echo("\n" . __METHOD__);
    }
}
$obj = new MagicConst();
$obj->magicConstFun();

?>
