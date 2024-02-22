<?php 

trait setNewUser{
    
    public function setNewUser($bankAccountNumber , $userName , $password){

        global $accountDetails;

        if(!array_key_exists($bankAccountNumber , $accountDetails)){

            
            $this->bankName = "STATE BANK OF INDIA" ;
            $this->bankAccountNumber = $bankAccountNumber ;
            $this->userName = $userName ;
            $this->password = $password ;
            $this->balance = 0 ;

            $transactionDetails = ['transactionType'=>'Account Created' ,'bankName'=>$this->bankName , 'bankAccountNumber'=>$this->bankAccountNumber , 'balance'=>$this->balance];
            $this->saveTransactionDetails($transactionDetails);

            global $accountDetails ;
            $accountDetails[$bankAccountNumber] = ['bankName'=>$this->bankName , 'bankAccountNumber'=>$this->bankAccountNumber , 'userName'=>$this->userName , 'password'=>$this->password , 'balance'=>$this->balance];
        }
        else{
            echo "User Already Registered in Bank!<BR>";
        }
    } 
    function saveTransactionDetails($transactionDetails){
        if(count($transactionDetails) != 0){
            $myfile = fopen('../Records/'.$this->bankAccountNumber.".txt", 'w') or die("Unable to open file");
            $text = json_encode($transactionDetails) . "\n";
            fwrite($myfile , $text);
            fclose($myfile);
            echo "Successfully save Transaction in file!<br>";
        }
        else{
            echo "Transaction Empty Found!<BR>";
        }
    }
}
?>