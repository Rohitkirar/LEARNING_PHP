<?php
require_once('FILE/connection.php');

$sql = 'CALL getTotalOrderINEachStatus(@shipped , @inprocess , @resolved , @disputed , @cancelled)';

require('FILE/printdata.php');

$result = mysqli_query($conn , $sql);

$resultArray = mysqli_query($conn,'SELECT @shipped , @inprocess , @disputed , @cancelled, @resolved');

$resultArray = mysqli_fetch_assoc($resultArray);

printf("shipped : %d | resolved : %d | cancelled : %d | disputed : %d | inprocess : %d " ,$resultArray['@shipped'] ,$resultArray['@resolved'] , $resultArray['@cancelled'] , $resultArray['@disputed'] , $resultArray['@inprocess'] );

echo "SHIPPED : " . $resultArray['@shipped'];
?>