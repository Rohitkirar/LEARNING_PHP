<?php 
// Encoding a multidimensional array and then decoding it again;

$multiArray = [
    "name" => [
        "name" => "Roman Reign" ,
        "city" => "california" ,
        "title" => "world heavyweight undisputed champion",
        "days" => "1000"
    ],
    "102"=>[
        "name" => "Seth Rollins" , 
        "city" => "New York" ,
        "title" => "WWE Champion" ,
        "days" => "300"
    ],
    "103"=>[
        "name" => "Gunthar",
        "city" => "Argentina",
        "title"=> "Intercontinatal champion",
        "days" => "900" 
    ]
    ];
echo "original Data : <BR><pre>" ;
    print_r($multiArray);

echo "<BR>After encodeing in json format data : <BR><BR>" ;
$encodeddata = json_encode($multiArray);
echo $encodeddata ."<BR><BR>" ;

$obj = json_decode($encodeddata);

echo "<BR>After decoding the encoded data in PHP object : <BR>" ;
print_r($obj);

echo($obj->name->name) ;
echo($obj->{102}->name) ; // to access numeric key in object we use {} braces;

echo"<BR>AFTER decoding the data in PHP ASSOCIative array : <BR>" ;

$assocArr = json_decode($encodeddata , true);

print_r($assocArr);

echo $assocArr['102']['name'];

echo "<br><BR></pre>" ;

?>