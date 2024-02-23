<?php 
//Example :  use an iterabe function argument

function printIterable(iterable $myIterable){
    foreach($myIterable as $item){
        echo $item . " ";
    }
}

$array = ["a" , "b" , "c"] ;
printIterable($array);
?>