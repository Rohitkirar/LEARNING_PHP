<?php 
/*
The array_multisort() function returns a sorted array. You can assign one or more arrays. The function sorts the first array, and the other arrays follow, then, if two or more values are the same, it sorts the next array, and so on.

Note: String keys will be maintained, but numeric keys will be re-indexed, starting at 0 and increase by 1.

Note: You can assign the sortorder and the sorttype parameters after each array. If not specified, each array parameter uses the default values.

Syntax
array_multisort(array1, sortorder, sorttype, array2, array3, ...)
Parameter Values
array1	Required. Specifies an array
sortorder Possible values: SORT_ASC / SORT_DESC 
sorttype	
SORT_REGULAR - Default. Compare elements normally (Standard ASCII)
SORT_NUMERIC - Compare elements as numeric values
SORT_STRING - Compare elements as string values
SORT_LOCALE_STRING - Compare elements as string, based on the current locale 
SORT_NATURAL - Compare elements as strings using "natural ordering" like natsort()
SORT_FLAG_CASE - Can be combined (bitwise OR) with SORT_STRING or SORT_NATURAL to sort strings case-insensitively
array2	Optional. Specifies an array
array3	Optional. Specifies an array
*/
Echo("EXAMPLE 1 : <BR>\n");

$a = ["Dog" , "Cat" , "Horse" , "Bear" , "Zebra"];
array_multisort($a);
print_r($a);

//Example 2
Echo("EXAMPLE 2 : <BR>\n");

$employee_id = [532 , 234 , 632];
$employee_name = ["Roman" , "John" , "Goldberg"];

for($x=0 ; $x<3 ; $x++){
    echo("Name : " . $employee_name[$x] . " Id : " . $employee_id[$x] . "<br>\n");
}

array_multisort($employee_name , $employee_id);

Echo("After Multisorting  <BR>\n");
for($x=0 ; $x<3 ; $x++){
    echo("Name : " . $employee_name[$x] . " Id : " . $employee_id[$x] . "<br>\n");
}

//Example 3
Echo("EXAMPLE 3 : <BR>\n");
$a1 = ["Dog" , "Dog" , "Cat"];
$a2 = ["Pluto" , "Fido" , "Missy"];
array_multisort($a1,SORT_ASC , $a2 , SORT_DESC);
print_r($a1);
print_r($a2);


//Example 4
Echo("EXAMPLE 4 : <BR>\n");
$n1 = [1,30,15, 7, 25];
$n2 = [4,30 , 20 , 41, 66];

$num = array_merge($n1 , $n2);
array_multisort($num , SORT_DESC , SORT_NUMERIC);
print_r($num);
?>