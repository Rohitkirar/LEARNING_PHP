<?php 

$StudentRecords = [] ;
$myfile = fopen('../Records/student.txt' , 'r') or die("Unable to open file") ;
while(!feof($myfile)){
    $encoded_data = fgets($myfile);
    $decoded_data = json_decode($encoded_data , true) ;
    if(!is_null($decoded_data))
        $StudentRecords += $decoded_data;
}

?>