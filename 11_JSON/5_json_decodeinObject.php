<?php 
/*
json_decode() fn is used to decode the json object into php object or php associative array 

By default this function return an object

But if we set second parameter true then it return data in associative array;

We can access the decode data simply as we are access the objects or arrays;
*/

//Example 1 decoding data in php object 

$data = ["name"=>"Arun Singhania" ,
         "age"=> 45,
         "account"=>23434234 ,
         "bankname"=>"State Bank of India",
         "branch" => "Satellite, Ahemdabaad"
];

$encodeddata = json_encode($data);
echo "Encode data : $encodeddata<br><br>" ;

$obj = json_decode($encodeddata);

echo "Decoded Data : ";
print_r($obj);

echo "<br><BR>Print data that is decoded : <BR>";
foreach($obj as $key => $value){
    echo "$key : $value<br>";
}

?>