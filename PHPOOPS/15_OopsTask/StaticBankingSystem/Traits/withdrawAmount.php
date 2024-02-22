<?php 
require_once("saveTransactionDetails.php");
trait withdrawAmount{
    use saveTransactionDetails;
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
                    echo "Insufficient Fund in your account<BR>";
                }
            }
            else{
                echo "Please Enter Valid amount!<BR>";
            }
        }
        else{
            echo "No User Found, Contact Bank!<br>";
        }

    }
}
?>