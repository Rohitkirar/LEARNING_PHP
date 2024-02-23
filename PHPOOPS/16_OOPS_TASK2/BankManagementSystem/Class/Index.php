<?php 
require_once("Bank.php");
require_once("User.php");
require_once("../Traits/Database.php");


// global array to store account details
$accountDetails = []  ;

$bank = new Bank();
$user = new User();

$accountDetails = $bank->fetchData();

startHomePage(1);

function startHomePage($x){
    while($x != 0){
        $user_input = (int)readline("Service :\n1 -> Login as Bank Manager \n2->Login as Customer\n0->exit") ;
        switch ($user_input){
            case '1' :
                global $bank;
                $managerId = readLine("Enter Manager ID : ");
                $managerPassword = readLine("Enter Manager password : ");
                if($bank->verification($managerId , $managerPassword)){
                    startBankPage(1);          
                }else{
                    echo "Invalid ManagerId / Password<br>\n";
                }
                break;
            case '2' :
                startUserPage(2);
                break;
            case '0' :
                $x = 0 ;
                break;
            default :
                echo "Please Choose Correct One!<br>\n";
        }
    }
}
function startBankPage($x){
    global $bank;
      while($x != 0){
        $user_input = (int)readline("Service :\n1 -> UserRegistration\n2->getUserDetails\n0->exit") ;
        switch ($user_input){
            case '1' :
                $bankAccountNumber = (int)readline("Enter new account Number:  ");
                $userName = readline("Enter user-name :  ");
                $password = readline("Enter password :  ");
                $bank->userRegistration($bankAccountNumber , $userName , $password);     
                break;
            case '2' :
                $result = $bank->getUserDetails();
                if($result){
                    echo "Accounts registered with Bank : <BR>\n";
                    print_r($result);
                    echo "<BR>\n";
                }            
                break;
            case '0' :
                $x = 0 ;
                break;
            default :
                echo "Please Choose Correct One!\n";
        }
    }
}
function startUserPage($x){
    global $user;
      while($x != 0){
        $user_input = (int)readline("Service :\n1 -> UserLogin\n0->exit") ;
        switch ($user_input){
            case '1' :
                $bankAccountNumber = (int)readline("Enter your account Number:  ");
                $userName = readline("Enter userName :  ");
                $password = readline("Enter password :  ");
                $returnvalue = $user->userLogin($bankAccountNumber , $userName , $password);
                if($returnvalue)
                    userService(1);            
                break;
            case '0' :
                $x = 0 ;
                break;
            default :
                echo "Please Choose Correct One!\n";
        }
    }
}
function userService($x){
    global $user;
      while($x != 0){
        $user_input = (int)readline("Service :\n1 -> CheckBalance\n2 -> Depoist\n3 -> Withdrawal\n4 -> show Transaction History\n0->exit") ;
        switch ($user_input){
            case '1' :
                $user->checkBalance();           
                break;
            case '2' :
                $amount = (int)readline("Enter Depoist Amount : ");
                $user->creditAmount($amount);            
                break;
            case '3' :
                $amount = (int)readline("Enter Withdrawal Amount : ");
                $user->withdrawAmount($amount);          
                break;
            case '4' :
                $user->showhistory();          
                break;
            case '0' :
                $x = 0 ;
                break;
            default :
                echo "Please Choose Correct One!\n";
        }
    }
}

?>