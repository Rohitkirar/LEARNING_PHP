<?php

//we can slice a string using substr() function
//substr($var , idxstart , idxend) 

$x = "Hello world !";
echo(substr($x , 6 ,5 ));

echo("<br>\n");

echo(substr($x , 6 ));

echo "<br>\n";

echo(substr($x , -5 , 3));

echo "<br>\n";

echo(substr($x , 6 , -2));

echo("<br>\n");

$str = "This is a string which is having length greater than 30. This is a string which is having length greater than 30";
$slicestr = substr($str , 57 );
print($slicestr);

echo "<br>\n"; 
?>