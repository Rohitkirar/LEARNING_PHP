<?php 
//json_encode() is used to encode the data in json format;

//Example 1 : indexed array to json format

Echo "EXAMPLE 1 : <BR>" ;

$array = ["Welcome" , "Hello World" ,"Good Morning" , "Beautiful Day", 4545 , 34.345, true , false ] ;

$datastring = json_encode($array);

var_dump($datastring) ;

echo "<br>";

echo $datastring . "<br>"; //output string "[containgdata]"



?>