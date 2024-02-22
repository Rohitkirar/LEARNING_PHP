<?php 
require_once("Bank.php");
require_once("UserLogin.php");

$accountDetails = []  ;

$bank = new Bank();
$bank->setNewUser(12345678, "hariom123" , "12345");
$bank->setNewUser(1234414, "hariom123" , "12345");
$bank->setNewUser(1354234515, "hariom123" , "12345");

$user = new UserLogin(12345678 , "hariom123" , "12345");

$user->checkBalance();
$user->creditAmount(10000);
$user->checkBalance();
$user->withdrawAmount(5000);
$user->checkBalance();

echo "<pre>";
print_r($accountDetails);

print_r($bank->getUserDetails());

$bank->saveRecords();

$user->showhistory();

echo "</pre>";


?>