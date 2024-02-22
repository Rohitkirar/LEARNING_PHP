<?php 
/* DOUBT
array_diff_uassoc() function compares the keys and values of two or more arrays and returns the differences.
Note : This function uses a user-defined function to compare the keys;
This function compares the keys and values of two (or more) arrays, and return an array that contains the entries from array1 that are not present in array2 or array3, etc.
Syntax
array_diff_uassoc(array1, array2, array3, ..., myfunction)
myfunction	Required. A string that define a callable comparison function. The comparison function must return an integer <, =, or > than 0 if the first argument is <, =, or > than the second argument

Return Value:	Returns an array containing the entries from array1 that are not present in any of the other arrays
*/

function myfunction($a,$b){
    if($a===$b){
        return 0;
    }
    return ($a>$b)?1 : -1;
}

$a1 = ["a" => "red" , "b"=>"green" , "c"=>"blue"];
$a2 = ["d" => "red" , "b"=>"green" , "e"=>"blue"];

$result=array_diff_uassoc($a1 , $a2 , "myfunction");
print_r($result);
?>