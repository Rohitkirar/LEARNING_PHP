<?php 
/*
explode("separator" , $var) : this function splits string into array
join is also similar as implode
str_split();
*/

#example - 1
$x = "Hello World !";
$y = explode(" " , $x);
print_r($y);

echo("<br>\n");

#example - 2
$str = "This is a string which is having length greater than 30. This is a string which is having length greater than 30";
$strarr = explode(" " , $str);
print_r($strarr );

for($x=0 ; $x< sizeof($strarr) ; $x++){
    print($strarr[$x] . " -> ");
}

echo("<br>\n");

#sizeof($var) and count($strarr) to find the size of and array
echo(sizeof($strarr) . " "  . count($strarr));

echo "<br>\n";


?>