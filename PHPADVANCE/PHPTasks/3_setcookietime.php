<?php 

// 3) set cookie on specific time. example:- set 12:30 time , it will be autometically removed
$currtime = time();

setcookie("category" , "books" ,$currtime+300 , '/') ;

if(isset($_COOKIE['category'])){
    echo "Category : " . $_COOKIE['category'] . "<br>";
}
else{
    echo "Cookie is not set <br>";
}

?>