<?php 
/*
filter_var() function both validate and sanitize data.

Return type ;
filter_var() : data|false;

filter_var() function filters a single variable with a specified filter. It takes two pieces of data:
    * The variable you want to check
    * The type of check to use

SYNTAX : 
filter_var(var , filter , option/flag) ;

here option is used to give range in form of array
*/
//Sanitize a String
//FILTER_SANITIZE_STRING is deprecated from php 8.1

$str = "<h1>Hello World!</h1>" ;
$newstr = filter_var($str , FILTER_SANITIZE_STRING); 

echo $str . "<br>\n" ;
echo $newstr . "<br>\n";

//validate an integer 

$int = 100 ;

if(filter_var($int  , FILTER_VALIDATE_INT)){
    echo("Integer is valid<Br>");
}
else{
    echo("Integer is not valid<br>");
}

echo("<BR>") ;

var_dump(filter_var('10201'  , FILTER_VALIDATE_INT)) ;

echo("<BR>") ;
//"if we assign a var to 0 and validate it through filter_var it return false as it take 0 as false so to overcome this we have a logic : <br> " ;

$int = 0 ;

if(filter_var($int , FILTER_VALIDATE_INT) === 0 || !filter_var($int , FILTER_VALIDATE_INT) === false){
    echo "integer is valid <br>" ;
}
else{
    echo "integer is invalid <br>" ;
}


//Example 3 validate integer and also check the range

$int = 120 ;
$options =  array(
                "options" => array(
                                "minrange" => 100 , 
                                "maxrange"=>200
                                )
                            );

if(filter_var($int , FILTER_VALIDATE_INT ,$options)){
    echo "$int is a valid integer and also in range of 100 to 200<br>" ;
}
else{
    echo "$int is not a valid integer or not in range 100 - 200 <br>" ;
}
?>