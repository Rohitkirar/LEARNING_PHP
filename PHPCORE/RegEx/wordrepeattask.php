<?php 
$text = "Hi5 Akash1 dont5 give6 such5 a1 difficult2 task7 to3 us12!";

$pattern = "/[a-zA-z]+/";
preg_match_all($pattern , $text , $matchtext );

$pattern = "/[0-9]/";
preg_match_all($pattern , $text , $matchnumber , );

$text = "";

for($i=0 ; $i<count($matchtext[0]) ; $i++){
    for($j=0 ; $j<$matchnumber[0][$i] ; $j++){
        $text .= $matchtext[0][$i] ." ";
    }
    $text .= " " ;
}

echo($text);

// print_r($matchtext);
// print_r($matchnumber);
?>