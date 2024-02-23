<?php 
// json object must be written {} braces only;

//creating a json object 

echo "EXAMPLE 1 : <BR><pre>" ;

$jsonObject = '{"name":"Arun","Age":"45","city":"Bhopal","state":"Madhya Pradesh","country":"India"}';

echo "Json OBject : " .  $jsonObject . "<br>";
echo "<hr>";
echo "Decoded Object : <br>";
print_r(json_decode($jsonObject));

echo "<hr>";
// Example 2 : we can also create json object by writing it in multiline

$jsonObject = '{
    "name":"Arun",
    "Age":"45",
    "city":"Bhopal",
    "state":"Madhya Pradesh",
    "country":"India"
}';

echo "Json OBject : " .  $jsonObject . "<br>";
echo "<hr>";
echo "Decoded Object : <br>";
print_r(json_decode($jsonObject));


echo "</pre><BR>" ;
?>