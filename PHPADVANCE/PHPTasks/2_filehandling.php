<?php 
//2) make txt filt with abcd...xyz, in second program get the file and remove vowels, print the new data without vowels   


$myfile = fopen("task.txt" , "r+") or die("unable to open file") ; 

$text = fread($myfile , filesize("task.txt"));

$vowel = ['a' , 'e' , 'i' , 'o' , 'u'] ;

foreach($vowel as $value){
    $text = str_ireplace($value , "-" , $text);
}

fseek($myfile , 0);

fwrite($myfile , $text );

fclose($myfile);
?>