<?php 
/*
filter_var($int , FILTER_VALIDATE_INT , Optionrange)
*/

//EXAMPLE 1 : 

$int = 888 ; 

$options = array(
    "options" => array(
        "min_range"=>800, 
        "max_range"=>1000
    )
);

if(filter_var($int , FILTER_VALIDATE_INT , $options)){
    echo "$int is int and in range 800 to 1000 <br>";
}
else{
    echo "Either $int is not int or not present in range 800 to 1000<br>" ;
}

//Example 2 

$int = 799 ; 


if(filter_var($int , FILTER_VALIDATE_INT , array("options" => array("min_range"=>800, "max_range"=>1000))
)){
    echo "$int is int and in range 800 to 1000 <br>";
}
else{
    echo "Either $int is not int or not present in range 800 to 1000<br>" ;
}
?>