<?php 
/*
filter_var($url , FILTER_VALIDATE_URL , FILTER_FLAG_QUERY_REQUIRED)
filter_var($url , FILTER_VALIDATE_URL , )
*/

$url = "https://www.w3schools.com?username=rk349034";

if(filter_var($url , FILTER_VALIDATE_URL , FILTER_FLAG_QUERY_REQUIRED)){

    echo "$url valid url<br>";
}
else{
    echo "$url invalid url<br>";
}

//example 2 ;

$url = "https://www.w3schools.com/index.php";

if(filter_var($url , FILTER_VALIDATE_URL , FILTER_FLAG_PATH_REQUIRED)){

    echo "$url valid url<br>";
}
else{
    echo "$url invalid url<br>";
}
?>