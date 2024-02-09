<?php 
/*
FILTER_SANITIZE_URL is used to remove all illegar character from the url 
*/
$url =  "https://www.w3schools.com" ;

echo "Before Sanitization url : $url  <br>";

$url = filter_var($url , FILTER_SANITIZE_URL);

echo "After sanitaization url : $url <br> ";

//Example 2 

echo "<br>" ;

$url = "http://localhost/Backend      g  Training/8_Filters/7_urlSanitization.php" ;

echo "Before Sanitization url : $url <br>";

$url = filter_var($url , FILTER_SANITIZE_URL) ;

echo "After Sanitization url  : $url <BR>" ;

?>