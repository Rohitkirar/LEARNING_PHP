<?php 
/*
array_merge() function merges one or more arrays into one array;
Tip: You can assign one array to the function, or as many as you like.
Note: If you assign only one array to the array_merge() function, and the keys are integers, the function returns a new array with integer keys starting at 0 and increases by 1 for each value (See example below).

Syntax
array_merge(array1, array2, array3, ...)

Return Value:	Returns the merged array

*/
$a1 = ["a"=>"red" , "b" => "green"];
$a2 = ["c"=>"blue" , "b" =>"yellow"];

print_r(array_merge($a1 , $a2));

//one array parameter with integer keys;
$a = [3 => "red" , 4 => "green"];
print_r(array_merge($a));

//EXAMPLE 
$storedcredential = [
    "name" => "Ben Jimmy",
    "email" => "benjimmy32@gmail.com",
    "address" => "Mysore"
];
$userinput = [
    "name" => "Jimmy Ben",
    "email" => "jimmyben32@gmail.com"
];

$updatedcredential = array_merge($storedcredential , $userinput);

Echo("Stored Credential : <br>\n");

foreach($storedcredential as $key=>$value){
    echo("$key : $value<br>\n");
}

Echo("Updated Credential : <br>\n");

foreach($updatedcredential as $key=>$value){
    echo("$key : $value<br>\n");
}
?>