<?php 
$numbers = [34 , 232 , 342 , 644 , 1443 , 8645];
$element = 644 ;//(int) readline("Enter number to search : ");

$index = binarySearch($numbers , $element);

if($index){
    echo "The $element is present in array at index : $index";
}
else{
    echo "The $element is not present in array.";
}
function binarySearch($numbers , $element){
    $low = 0 ;
    $high = count($numbers)-1;

    if($low >= $high )
        return 0 ;

    while($low<=$high){
        $mid  = (int) ($low + ($high-$low)/2) ; 
        if($numbers[$mid] == $element)
            return $mid ;

        elseif($numbers[$mid] < $element){
            $low = $mid+1;
        }
        else{
            $high = $mid-1;
        }
    }   
    return 0 ;
}
?>