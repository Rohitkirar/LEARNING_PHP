<?php 
/*
Variable number of argument
By using the ... operator in front of the function parameter, the function accepts an unknown number of arguments. This is also called a variadic function.

IMP : * The variadic function argument becomes an array.
      * You can only have one argument with variable length, and it has to be the last argument.
      * If the variadic argument is not the last argument, you will get an error.
*/
function sumMyNumbers(...$x){
    $n = 0 ;
    foreach($x as $i){
        $n += $i;
    }
    return $n;
}
$n = sumMyNumbers(5, 2, 6, 2, 7, 7);
echo($n . "<br>\n");

function myFamily($lastname, ...$firstname){
    $txt = "" ;
    foreach($firstname as $fname){
        $txt = $txt."Hi, $fname $lastname.<br>\n";
    }
    return $txt;
}
$txt = myFamily("Doe" , "Jane" , "John" , "Joey");
echo($txt);



?>