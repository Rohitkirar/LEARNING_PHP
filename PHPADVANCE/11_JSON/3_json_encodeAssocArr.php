<?php 
//Example 2 associative array to json format

$array = ["name"=>"Roman",
          "city"=>"california",
          "title"=>"World undisputed champion",
          "designation"=>"wrestler"  
];

$jsonEncodedStr = json_encode($array);

echo "jsonEncodestring of Associative array : - . $jsonEncodedStr <BR>" ;

var_dump($jsonEncodedStr);

echo "<br>" ;
?>