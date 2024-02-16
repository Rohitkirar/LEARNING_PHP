<?php 
require_once('../Traits/checkBalance.php');
require_once('../Traits/creditAmount.php');
require_once('../Traits/withdrawAmount.php');
require_once('../Traits/showhistory.php');

class UserLogin{
    private $userName , $password , $balance ,$bankAccountNumber ;

    public function __construct($bankAccountNumber , $userName , $password){
        
        global $accountDetails;
        if(array_key_exists($bankAccountNumber , $accountDetails)){
            if($accountDetails[$bankAccountNumber]['userName'] == $userName && $accountDetails[$bankAccountNumber]['password'] == $password ){
                $this->bankAccountNumber = $bankAccountNumber ; 
                $this->userName = $userName;
                $this->password = $password;
                $this->balance = $accountDetails[$bankAccountNumber]['balance'];
            }
            else{
                echo "Username / Password Wrong!<br>";
            }
        }
        else{
            echo "User Not Found in Bank Please check your details<BR>";
        }
    } 

    use checkBalance , creditAmount , withdrawAmount , showhistory ;

}

?>