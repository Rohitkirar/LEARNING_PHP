<?php 
/*
The array_search() function search an array for a value and returns the key;
SYNTAX 
array_search(value, array, strict(true,false))

*/
$a = ["a"=>"red" , "b"=>["purple","green"] , "c"=>"blue"];
echo(array_search("red" , $a) . "<br>\n");
echo(array_search("green" , $a) . "<br>\n");

echo(array_search("blue" , $a ) . "<br>\n");

$b = ["a"=>"5" , "b"=>5 , "c"=>"5"];
echo(array_search(5 , $b , true) . "<br>\n");
echo(array_search("5" , $b , true) . "<br>\n");

ECHO "EXAMPLE 2 : <Br>\n";

$student = [
    "name"=> [
        'id' => 5698,
        'first_name' => 'Peter',
        'last_name' => 'Griffin',
        'contact' => [ 
            "mobile"=>3494892,
            "email" => "reropdf@gmail.com"
        ]
    ],
    "student2"=> [
        'id' => 4767,
        'first_name' => 'Ben',
        'last_name' => 'Smith',
        'contact' => [ 
            "mobile"=>3494892,
            "email" => "reropdf@gmail.com"
        ]
    ],
    "student3" => [
        'id' => 3809,
        'first_name' => 'Joe' , 
        'last_name' => 'Doe',
        'contact' => [ 
            "mobile"=>3494892,
            "email" => "reropdf@gmail.com"
        ]
    ]
    ];

echo  array_search("3809" , $student["student3"] ) , " <br>\n";

echo array_search("3494892" , $student["student3"]["contact"]);


?>