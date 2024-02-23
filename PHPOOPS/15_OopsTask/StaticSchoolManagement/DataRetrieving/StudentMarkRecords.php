<?php 
$StudentMarkRecords = [] ;

$myfile1 = fopen('../Records/marks.txt' , 'r') or die("Unable to open file") ;
while(!feof($myfile1)){
    $encoded_data = fgets($myfile1);
    $decoded_data = json_decode($encoded_data , true) ;
    if(!is_null($decoded_data))
        $StudentMarkRecords = $decoded_data;
}

?>