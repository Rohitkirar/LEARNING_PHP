<?php 

class OddNumberException extends Exception{} ;
$totalSum = 0 ; 

$array = [ 2122, 34232, 3452, 31];
echo "The passed array contains Odd no <BR>" ;
try{
    foreach($array as $value){
        sumofEvenNumber($value);
    }
}
catch(OddNumberException $e){
    echo $e->getMessage() . "<br>" ;
    echo "Totalsum of even number before exception occured : $totalSum<br>";
}
catch(Exception $e ){
    echo $e->getMessage() ."<br>"; 

}

echo "<BR>" ;

$array = [ 2122, 34232, 3452, 32];
echo "The passed array contains even no <BR>" ;
try{
    foreach($array as $value){
        sumofEvenNumber($value);
    }
    echo "TotalSum of even number : $totalSum <BR>";
}
catch(OddNumberException $e){
    echo $e->getMessage() . "<br>" ;
    echo "Totalsum of even number before exception occured : $totalSum<br>";
}
catch(Exception $e ){
    echo $e->getMessage() ."<br>"; 

}

function sumofEvenNumber($number){
    global $totalSum ;
    if($number%2 == 1){
        throw new OddNumberException("Error : the function is not accepting  odd number") ;
    }
    $totalSum += $number ;
}

?>