<?php 
require_once("../Traits/Database.php");
class User{

    use Database;

    private $userName , $password , $balance ,$bankAccountNumber ;

    //checking user exist or not in db
    public function userLogin($bankAccountNumber , $userName , $password){
        global $accountDetails;
        if(array_key_exists($bankAccountNumber , $accountDetails)){
            if($accountDetails[$bankAccountNumber]['userName'] == $userName && $accountDetails[$bankAccountNumber]['password'] == $password ){
                $this->bankAccountNumber = $bankAccountNumber ; 
                $this->userName = $userName;
                $this->password = $password;
                $this->balance = $accountDetails[$bankAccountNumber]['balance'];
            }
            else{
                echo "Username / Password Wrong!<br>\n";
                return false;
            }
        }
        else{
            echo "User Not Found in Bank Please check your details<BR>\n";
            return false;
        }
        return true;
    } 
    //balance check function
    public function checkBalance(){
        if(isset($this->userName)){
            echo "Account Balance : " . $this->balance . "<BR>\n";
        }
    }

    public function creditAmount($amount){
        if(isset($this->userName)){
            if($amount > 0 && $amount <= 100000){
                $this->balance += $amount;
                global $accountDetails;
                $accountDetails[$this->bankAccountNumber]['balance'] =  $this->balance ;

                echo "Successfully creditted Amount $amount<BR>";
                $transactionDetails = ['transactionType'=>'Amount Credited' , 'bankAccountNumber'=>$this->bankAccountNumber ,'creditedAmount'=>$amount , 'balance'=>$this->balance];
                $this->saveTransactionDetails($transactionDetails);
            }
            else{
                echo "Please Enter Valid amount!<BR>\n";
            }
        }
        else{
            echo "No User Found, Contact Bank!<br>\n";
        }
    }
    // withdrawal amount function
    public function withdrawAmount($amount){
        if(isset($this->userName)){
            if($amount > 0 && $amount <= 100000){
                if($this->balance >= $amount){
                    $this->balance -= $amount;
                    global $accountDetails;
                    $accountDetails[$this->bankAccountNumber]['balance'] =  $this->balance ; 
                    echo "Successfully withdrawal Amount $amount<BR>";
                    $transactionDetails = ['transactionType'=>'Amount Withdrawal' , 'bankAccountNumber'=>$this->bankAccountNumber ,'withdrawalAmount'=>$amount , 'balance'=>$this->balance];
                    $this->saveTransactionDetails($transactionDetails);
                }
                else{
                    echo "Insufficient Fund in your account<BR>\n";
                }
            }
            else{
                echo "Please Enter Valid amount!<BR>\n";
            }
        }
        else{
            echo "No User Found, Contact Bank!<br>\n";
        }
    }
    //To check transaction history of a user 
    public function showhistory(){
        $historyarray = [];
        $myfile = fopen('../Records/'.$this->bankAccountNumber.".txt" , "r") or die("Unable to open file");
        $x = 0 ;
        while(!feof($myfile)){
            $encoded_data = fgets($myfile);
            $decoded_data = json_decode($encoded_data , true);
            if(!is_null($decoded_data))
                $historyarray[$x++] = $decoded_data;
        }
        echo "<pre> <br> TRANSACTION HISTORY <BR>\n";
        print_r($historyarray);
        echo "</pre>" ;
    }

    
}

?>