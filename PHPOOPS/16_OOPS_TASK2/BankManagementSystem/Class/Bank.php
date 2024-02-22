<?php 
require_once('../Traits/Database.php');
class Bank {
    
    use Database;
    private $bankName , $userName , $password , $bankAccountNumber ;
    private $balance , $managerId = 101 , $managerPassword = "bank123" ;

    public function verification($managerId , $managerPassword){
        if($this->managerId == $managerId && $managerPassword == $this->managerPassword){
            return true;
        }
        return false;
    }

    public function userRegistration($bankAccountNumber , $userName , $password){

        global $accountDetails;

        if(!array_key_exists($bankAccountNumber , $accountDetails)){
            $this->bankName = "STATE BANK OF INDIA" ;
            $this->bankAccountNumber = $bankAccountNumber ;
            $this->userName = $userName ;
            $this->password = $password ;
            $this->balance = 0 ;

            $transactionDetails = ['transactionType'=>'Account Created' ,'bankName'=>$this->bankName , 'bankAccountNumber'=>$this->bankAccountNumber , 'balance'=>$this->balance];
            $this->saveTransactionDetails($transactionDetails);

            $accountDetails[$bankAccountNumber] = ['bankName'=>$this->bankName , 'bankAccountNumber'=>$this->bankAccountNumber , 'userName'=>$this->userName , 'password'=>$this->password , 'balance'=>$this->balance];
            $this->saveRecords();
        }
        else{
            echo "User Already Registered in Bank!<BR>\n";
        }
    }

    public function getUserDetails(){
        global $accountDetails;
        if(count($accountDetails) > 0){
            echo "</pre>Account Registered With Bank : ";
            print_r($accountDetails);
            echo "</pre>\n" ;
        }
        else{
            echo "No Account Found in Records\n";
        }
    }

}

?>