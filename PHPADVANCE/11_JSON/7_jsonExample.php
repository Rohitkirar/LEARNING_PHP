<?php 
//in this example decoding a json object without using json decode function

$data = ["name"=>"Arun Singhania" ,
         "age"=> 45,
         "account"=>23434234 ,
         "bankname"=>"State Bank of India",
         "branch" => "Satellite"
];

$encodeddata = json_encode($data);
echo "Encoded data : $encodeddata<br><br>" ;

$stringdata = substr($encodeddata , 1 , -1); //removing the brackets with substr function
echo $stringdata."<br><BR>";

$trimdata = trim($encodeddata , '{}' ) ; //removing the brackets also do with trim function
echo $trimdata . "<BR><BR>" ;

$array = explode("," , $stringdata);

print_r($array);

echo "<BR><BR>" ;

$assocArr = [];

foreach($array as $key=>$value){
    $temparr = explode(":" , $value) ;
    $assocArr[$temparr[0]] = $temparr[1] ;
}

print_r($assocArr);



?>