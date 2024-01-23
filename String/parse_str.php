<?php 
// parse_str(string , arrayname);
// arrayname argument to store element in array
parse_str("name=rohit&age=20" , $arr);

print($arr['name'] . " " . $arr['age']);

echo("<br>/n");

var_dump($arr);

echo("<br>/n");

// parse_str("name=roman");  generating error we have to give exactly 2 arguments
echo("<br>/n");
?>