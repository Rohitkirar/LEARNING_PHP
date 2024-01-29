<?php 
/*
array_map() function sends each value of an array to a user made function and returns an array with new values , given by the user made function
Tip: You can assign one array to the function, or as many as you like.
Syntax
array_map(myfunction, array1, array2, array3, ...)
*/
function square($x){
    return $x**2;
}
$arr = [1,2,3,4,5];
$arr1 = [10,20,30,40,50];
print_r(array_map("square" , $arr , $arr1));

function changevalue($v){
    if($v == "Dog"){
        return "Fido";
    }
    return $v;
}
$a = ["Horse" , "Dog" , "Cat"];
print_r(array_map("changevalue" , $a));

function equals($v1 , $v2){
    if($v1===$v2)
        return "same";
    return "different";
}
$a1 = ["Horse" , "Dog" , "Cat"];
$a2 = ["Cow" , "Dog" , "Rat"];
print_r(array_map("equals" , $a1 , $a2));

//changing all value of array to uppercase
function toUpperCase($v){
    $v = strtoupper($v);
    return $v;
}
$a3 = ["Animal"=>"horse" , "Type"=>"mammal"];
print_r(array_map("toUpperCase" , $a3));
//assign null as the function name 
$a4 = ["Dog" , "Cat"];
$a5 = ["Puppy" , "Kitten"];
print_r(array_map(null , $a4  , $a5)); // create a MD array
?>