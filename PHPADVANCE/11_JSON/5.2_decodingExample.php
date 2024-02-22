<?php 
//converting encoded json format into associative array 
echo "<pre>" ;

$encodedJsonData = '{"101":{"name":"Arjun Pandey","age":"35","designation":"FullstackDeveloper"},"102":{"name":"Veer Pratap","age":"23","designation":"php Developer"}}';

echo $encodedJsonData . "<br>";

$decodedData = json_decode($encodedJsonData , true) ; //to convert it into associative pass true as 2 parameter

print_r($decodedData);

echo "<hr>";

// Accessing the value of the associative array one by one
foreach($decodedData as $key=>$values){
    echo "id : $key <br>" ;
    foreach($values as $k=>$v){
        echo "$k : $v<br>" ;
    }
    echo "<hr>";
}

echo "</pre>" ;
?>