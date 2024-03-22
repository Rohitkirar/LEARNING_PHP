<?php 
require('../Database/Connection.php');
require('../Class/User.php');
$user = new USER(9 , $conn);
var_dump($user);
// var_dump($user->userDetails(9));
// echo "<BR><BR><HR><BR>";
// print_r($user->storyDetails(27));
// echo "<BR><BR><HR><BR>";
// print_r($user->storyDetails(27));
?>