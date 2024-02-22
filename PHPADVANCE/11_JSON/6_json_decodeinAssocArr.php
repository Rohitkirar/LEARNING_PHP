<?php 
//json_decode fn used to decode an encoded data in associative array

$data = ["name"=>"Arun Singhania" ,
         "age"=> 45,
         "account"=>23434234 ,
         "bankname"=>"State Bank of India",
         "branch" => "Satellite, Ahemdabaad"
];

$encodeddata = json_encode($data);
echo "Encoded data : $encodeddata<br><br>" ;

$associativeArray = json_decode($encodeddata , true);

print_r($associativeArray);

echo "<br><BR>ouput of decoded data : <br>";
foreach($associativeArray as $key => $value){
    echo "$key  : $value<br>" ;
}
?>