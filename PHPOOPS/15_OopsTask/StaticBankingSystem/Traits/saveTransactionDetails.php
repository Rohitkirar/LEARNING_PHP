<?php 
trait saveTransactionDetails{
    function saveTransactionDetails($transactionDetails){
        if(count($transactionDetails) != 0){
            $myfile = fopen('../Records/'.$this->bankAccountNumber.".txt", 'a') or die("Unable to open file");
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