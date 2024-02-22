<?php

//strlen(string)  to find the length of string or number of character present including spaces

$str = "This is a string which is having length greater than 30. This is a string which is having length greater than 30";

$len =  strlen($str);

echo("the length of string is : " . $len );

echo("<br>\n");

//print each character of string

for($x=0 ; $x<$len ; $x++){
    echo("\"$str[$x]\"" . " ");
}

echo("<br>\n");

?>