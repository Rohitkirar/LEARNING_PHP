<?php
require_once('database/connection.php');
// $sql = "CALL users_data('rohit' , 'kirar' , 12 ,'male' ,'rohitkirar123@gmail.com' , '1234567890' , 'rohitkirar090' , '12345' , 'user')";

$first_name = 'hariom';
$last_name = 'patel';
$age = 22;
$gender = 'male';
$email = 'riomkriar123@gmail.com' ;
$mobile = '433455675';
$username = 'Kariom123';
$password = '2323455' ;
$role = 'admin';

$arr = [$first_name , $last_name , $age , $gender , $email , $mobile , $username , $password , $role];

$str = json_encode($arr);
$str = substr($str , 1 , -1);
ECHO $str;

// // $sql = "call users_data('{$first_name}' , '{$last_name}' , '{$age}' , '{$gender}' , '{$email}' , '{$mobile}' , '{$username}' , '{$password}' , '{$role}')";
// $sql = "call users_data('$first_name' , '$last_name' , '$age' , '$gender' , '$email' , '$mobile' , '$username' , '$password' , '$role')";
$sql = "call users_data($str)";

$result = mysqli_query($conn , $sql);
if($result){
    echo "user data saved successfully <BR>";
}
else{
    echo "ERROR : " . mysqli_error($conn);
}
?>