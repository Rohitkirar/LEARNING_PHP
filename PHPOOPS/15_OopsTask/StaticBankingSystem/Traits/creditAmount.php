<?php 
require_once("saveTransactionDetails.php");
trait creditAmount{
    use saveTransactionDetails;
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
                echo "Please Enter Valid amount!<BR>";
            }
        }
        else{
            echo "No User Found, Contact Bank!<br>";
        }

    }
}
?>