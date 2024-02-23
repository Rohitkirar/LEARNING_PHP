<?php 
//callback function can also pass as arguments in user defined function also

//EXAMPLE 1 : 
echo "EXAMPLE 1 : <BR>" ;

function exclaimation($data){
    echo $data ." !<br>"; 
}
function question($data){
    echo $data . " ?<br>" ;
}

function strAddition($data , $fun){
    return $fun($data);
}

strAddition("HELLO WORLD" , 'exclaimation') ;

strAddition("HELLO WORLD" , 'question') ;

//Example 2 
Echo "Example 2 : <BR>";

$arr = [1,2,3,4,5] ;

Echo "Calculating square of array element using user defined funciton <BR>" ;
print_r(arraySquare($arr , "square"));

function square($num){
    return $num**2;
}

function arraySquare($arr , $fun){
    $resultarr = [];
    foreach($arr as $key => $val){
        $resultarr[$key] = $fun($val) ; 
    }
    return $resultarr;
}
?>