<?php

if($_SESSION['balance'] == 0){
    $myfile = fopen("Transaction.txt" , 'w')  or die("Unable to open file") ;
    $transactionId = uniqid("");
    $transaction = "\n<br>Transaction Id : $transactionId" .
    "\n<br>UserName : " . $_SESSION['username'] . 
    "\n<br>Bank Name : " . $_SESSION['bankname'] . 
    "\n<br>Account Number : " . $_SESSION['bankaccountnumber'] . 
    "\n<br>Balance : " . $_SESSION['balance'] . "<br>\n" ;

    fwrite($myfile , $transaction);
    fclose($myfile);
}
else{
    $myfile = fopen("Transaction.txt" , 'a')  or die("Unable to open file") ;
    $transactionId = uniqid("");
    $transaction = "\n<br>Transaction Id : $transactionId" .
    "\n<br>UserName : " . $_SESSION['username'] . 
    "\n<br>Bank Name : " . $_SESSION['bankname'] . 
    "\n<br>Account Number : " . $_SESSION['bankaccountnumber'] . 
    "\n<br>Balance : " . $_SESSION['balance']  . "<br>\n";

    fwrite($myfile , $transaction);
    fclose($myfile);
}

?>