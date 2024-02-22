<?php 

//Linear Search to search an element in array

$numbers = [45 ,1, 343 , 867 , 123 , 987];
$element = 867;

$index = linearSearch($numbers , $element);

if($index)
    echo "The $element is present in array at index : $index";
else{
    echo "The $element is not present in array.";
}
function linearSearch($numbers, $element){
    for($i=0 ; $i<count($numbers) ; $i++){
        if($numbers[$i] == $element){
            return $i;
        }
    }
    return 0 ;
}
?>