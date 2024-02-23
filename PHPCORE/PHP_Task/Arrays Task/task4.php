<?php 
//Q4. Given the associative array $userActivity = ["John" => ["Login" => 5, "Logout" => 3, "Post" => 10], "Alice" => ["Login" => 8, "Logout" => 6, "Post" => 15], "Bob" => ["Login" => 7, "Logout" => 4, "Post" => 12]], find and print the user with the highest total activity (sum of login, logout, and post).

$userActivity = [
    "John" => ["Login" => 5 , "Logout" => 3 , "Post" => 10],
    "Alice" => ["Login" => 8 , "Logout" => 6 , "Post" => 15],
    "Bob" => ["Login" => 7 , "Logout" => 4 , "Post" => 12]
];

$resultarray = [] ;

foreach($userActivity as $key=>$values){
    $totalactivity = 0 ;
    foreach($values as $k=>$v ){
        $totalactivity += $v ;
    }
    $resultarray[$key] = $totalactivity;
}

arsort($resultarray);

foreach($resultarray as $key=>$value){
    echo "Name of User : $key and Total activity  : $value <br>\n";
    break;
}
?>